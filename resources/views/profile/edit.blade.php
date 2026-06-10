<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7f6f9] min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-md w-full max-w-lg p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-6 text-center">Mon Profil</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            {{-- Login --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">Login</label>
                <input type="text" name="login"
                    value="{{ old('login', $user->login) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                           @error('login') border-red-500 @enderror">
                @error('login')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                           @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Téléphone --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">Téléphone</label>
                <input type="tel" name="phone"
                    value="{{ old('phone', $user->phone) }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                           @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nouveau mot de passe --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Nouveau mot de passe <span class="text-gray-400 font-normal">(laisser vide pour ne pas changer)</span>
                </label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                           @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmation mot de passe --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-1">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                    Sauvegarder
                </button>
                <a href="{{ route('dashboard') }}"
                    class="flex-1 text-center bg-gray-100 text-gray-700 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">
                    Retour
                </a>
            </div>
        </form>
    </div>
</body>
</html>