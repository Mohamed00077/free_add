<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  
    <div class="max-w-5xl mx-auto py-8 px-4">

        <h1 class="text-2xl font-bold mb-6">Liste des utilisateurs</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

              <a href="{{ route('admin.index') }}"
           class="text-blue-600 hover:underline text-sm">← Retour</a>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Nom</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Rôle</th>
                        <th class="px-4 py-3 text-left">Inscrit le</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $user->id }}</td>
                            <td class="px-4 py-3 font-medium">{{ $user->login }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $user->role === 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-400">
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600">
                                    Modifier
                                </a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Supprimer cet utilisateur ?')"
                                            class="bg-red-600 text-white px-3 py-1 rounded text-xs hover:bg-red-700">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>