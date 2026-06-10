<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
        <div class="max-w-xl mx-auto py-8 px-4">

        <a href="{{ route('admin.users.index') }}"
           class="text-blue-600 hover:underline text-sm">← Retour</a>

        <div class="bg-white rounded shadow p-6 mt-4">
            <h1 class="text-xl font-bold mb-2">Modifier le rôle</h1>
            <p class="text-gray-500 text-sm mb-6">{{ $user->login }} — {{ $user->email }}</p>

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rôle</label>
                    <select name="role" class="w-full border rounded px-3 py-2">
                        <option value="user"  {{ $user->role === 'user'  ? 'selected' : '' }}>Utilisateur</option>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</body>
</html>

