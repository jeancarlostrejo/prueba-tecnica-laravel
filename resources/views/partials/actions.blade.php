<div>
    <a href="{{ route('users.edit', $id) }}"
        class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
    <form action="{{ route('users.destroy', $id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-block px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600"
            onclick="return confirm('Are you sure you want to delete the user?')">Delete</button>
    </form>
</div>
