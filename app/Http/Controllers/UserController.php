<?php

namespace App\Http\Controllers;

use App\enums\Rol;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $countries = Country::all();
        return view('users.create', compact('countries'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function data(Request $request)
    {

        // Realizar un join entre la tabla users y cities para obtener el nombre de la ciudad
        $users = DB::table('users')
            // Relación entre usuarios y ciudades
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->select(
                'users.id',
                'users.identifier',
                'users.name',
                'users.email',
                'users.phone',
                'users.dni',
                'users.birth_date',
                'cities.name as city_name', // Obtener el nombre de la ciudad
                'users.role'
            )
            ->where('users.role', Rol::USER->value); // Filtrar solo los usuarios con rol 'user'

        // filtrar los datos por el campo de busqueda en las columnas 
        // name, dni, email, phone
        return DataTables::of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && $request->input('search.value')) {
                    $search = $request->input('search.value');
                    $query->where(function ($q) use ($search) {
                        $q->where('users.name', 'like', "%{$search}%")
                            ->orWhere('users.dni', 'like', "%{$search}%")
                            ->orWhere('users.email', 'like', "%{$search}%")
                            ->orWhere('users.phone', 'like', "%{$search}%");
                    });
                }
            })
            // Agregamos indices a las columnas para numerar las filas
            ->addIndexColumn()
            // Formatear la fecha de nacimiento
            ->editColumn('birth_date', function ($user) {
                return Carbon::parse($user->birth_date)->format('d/m/Y');
            })
            // Agregamos un campo para calcular la edad
            ->addColumn('age', function ($user) {
                return Carbon::parse($user->birth_date)->age;
            })
            // Agregamos botones de accion por medio de un view partial
            ->addColumn('action', 'partials.actions')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function edit(User $user): View
    {
        $user->load('city.state.country'); // Cargar la relación de ciudad si es necesario

        $countries = Country::select('id', 'name')->get();

        // Obetener los estados y las ciudades basados en la informacion del usuario
        $states = State::where('country_id', $user->city->state->country->id)->select('id', 'name')->get();
        $cities = City::where('state_id', $user->city->state->id)->select('id', 'name')->get();

        return view('users.edit', compact('user', 'countries', 'states', 'cities'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $dataValidated = $request->validated();

        if(!$dataValidated['password']) {
            unset($dataValidated['password']);
        }

        $user->fill($dataValidated);
        $user->save();

        DB::table('sessions')->where('user_id', $user->id)->delete();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
