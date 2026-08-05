<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - MmsShop</title>
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
                <i class="fas fa-user-plus text-red-600 fa-lg"></i>
              </div>
              <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
              <p class="text-gray-600 mt-2">Get started with your account</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register.store') }}">
              @csrf

              <!-- Login -->
              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Login</label>
                <input
                  type="text"
                  name="login"
                  value="{{ old('login') }}"
                  required
                  class="w-full px-4 py-3 rounded-lg border @error('login') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-600 focus:border-transparent transition-colors"
                  placeholder="Ton pseudo"
                />
                @error('login')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

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

              <!-- Téléphone -->
              <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                <input
                  type="tel"
                  name="phone"
                  value="{{ old('phone') }}"
                  required
                  class="w-full px-4 py-3 rounded-lg border @error('phone') border-red-500 @else border-gray-300 @enderror focus:ring-2 focus:ring-red-600 focus:border-transparent transition-colors"
                  placeholder="07 XX XX XX XX"
                />
                @error('phone')
                  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-6" x-data="{ showPassword: false }">
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

              <!-- Confirm Password -->
              <div class="mb-6" x-data="{ showConfirmPassword: false }">
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <div class="relative">
                  <input
                    :type="showConfirmPassword ? 'text' : 'password'"
                    name="password_confirmation"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-red-600 focus:border-transparent transition-colors"
                    placeholder="••••••••"
                  />
                  <button
                    type="button"
                    class="absolute right-3 top-3 text-gray-400 hover:text-gray-600"
                    @click="showConfirmPassword = !showConfirmPassword"
                  >
                    <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                  </button>
                </div>
              </div>

              <!-- Submit -->
              <button
                type="submit"
                class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 focus:ring-4 focus:ring-red-600 focus:ring-opacity-50 transition-colors"
              >
                Create Account
              </button>
            </form>

            <!-- Switch to login -->
            <p class="mt-6 text-center text-gray-600">
              Déjà un compte ?
              <a href="{{ route('login') }}" class="ml-1 text-red-600 hover:text-red-700 font-semibold">
                Se connecter
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