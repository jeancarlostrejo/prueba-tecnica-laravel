<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'identifier' => ['required', 'integer', 'unique:users,identifier'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()
                    ->numbers()
                    ->mixedCase()
                    ->symbols()
            ],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'digits:10'],
            'dni' => ['required', 'string', 'max:11', 'unique:users,dni'],
            'birth_date' => ['required', 'date', 'before:' . Carbon::now()->subYear(18)->format('Y-m-d')],
            'country_id' => ['required', 'exists:countries,id'],
            'state_id' => ['required', 'exists:states,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $countryId = $this->input('country_id');
            $stateId = $this->input('state_id');
            $cityId = $this->input('city_id');

            // Verificar que el estado pertenece al país
            $state = State::where('id', $stateId)->where('country_id', $countryId)->first();
            if (!$state) {
                $validator->errors()->add('state_id', 'The selected state does not belong to the selected country.');
            }

            // Verificar que la ciudad pertenece al estado
            $city = City::where('id', $cityId)->where('state_id', $stateId)->first();
            if (!$city) {
                $validator->errors()->add('city_id', 'The selected city does not belong to the selected state.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'birth_date.before' => 'You must be at least 18 years old.',
        ];
    }
}
