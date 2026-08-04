<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - MmsShop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
      display: none;
    }
  </style>
</head>
<body>
  <div class="min-h-screen bg-gray-100">
    <div class="min-h-screen flex">
      <!-- Left Side - Auth Form -->
      <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
          <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-4">
                <i class="fas fa-sign-in-alt text-red-600 fa-lg"></i>
              </div>
              <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
              <p class="text-gray-600 mt-2">Please sign in to continue</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email -->
              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                  <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-3 rounded-lg border @error('email') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-600 focus:border-transparent transition-colors"
                    placeholder="you@example.com"
                  />
                  <i class="fas fa-envelope absolute right-4 top-4 text-gray-400"></i>
                </div>
                @error('email')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-4" x-data="{ showPassword: false }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                  <input
                    :type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    class="w-full px-4 py-3 rounded-lg border @error('password') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-600 focus:border-transparent transition-colors"
                    placeholder="••••••••"
                  />
                  <button
                    type="button"
                    class="absolute right-3 top-3 text-gray-400 hover:text-gray-600"
                    @click="showPassword = !showPassword"
                  >
                    <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                  </button>
                </div>
                @error('password')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Remember me -->
              <div class="mb-6 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-red-600 focus:ring-red-600">
                <label for="remember" class="ml-2 text-sm text-gray-600">Se souvenir de moi</label>
              </div>

              <!-- Submit -->
              <button
                type="submit"
                class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 focus:ring-4 focus:ring-red-600 focus:ring-opacity-50 transition-colors"
              >
                Sign In
              </button>
            </form>

            <!-- Separator -->
            <div class="flex items-center my-6">
              <div class="flex-grow border-t border-gray-200"></div>
              <span class="mx-4 text-sm text-gray-400">ou</span>
              <div class="flex-grow border-t border-gray-200"></div>
            </div>

            <!-- Google -->
            <a href="{{ route('google.redirect') }}"
              class="w-full flex items-center justify-center gap-3 border border-gray-300 py-3 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
              <i class="fab fa-google text-red-600"></i>
              Se connecter avec Google
            </a>

            <!-- Switch to register -->
            <p class="mt-6 text-center text-gray-600">
              Pas encore de compte ?
              <a href="{{ route('register') }}" class="ml-1 text-red-600 hover:text-red-700 font-semibold">
                S'inscrire
              </a>
            </p>
          </div>
        </div>
      </div>

      <!-- Right Side - Image -->
      <div
        class="hidden lg:block lg:w-1/2 bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80')"
      >
        <div class="h-full bg-black bg-opacity-50 flex items-center justify-center">
          <div class="text-center text-white px-12">
            <h2 class="text-4xl font-bold mb-6">MmsShop</h2>
            <p class="text-xl">Achetez et vendez en toute simplicité, entre particuliers.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>