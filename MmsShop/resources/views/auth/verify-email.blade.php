<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de l'email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7f6f9] min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-md w-full max-w-lg p-8 text-center">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Vérifiez votre email</h2>

        <p class="text-gray-600 text-sm mb-6">
            Merci de votre inscription ! Avant de commencer, merci de cliquer sur le lien
            que nous venons de vous envoyer par email pour confirmer votre adresse.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
                Un nouveau lien de vérification a été envoyé à votre adresse email.
            </div>
        @endif

        <div class="flex flex-col gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                    Renvoyer l'email de vérification
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-100 text-gray-700 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</body>
</html>