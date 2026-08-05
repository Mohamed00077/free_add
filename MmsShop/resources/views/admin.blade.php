<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MmsShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-blue': '#1e40af',
                        'brand-dark': '#1e293b',
                        'brand-accent': '#3b82f6'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-brand-dark shadow-xl z-50">
        <div class="flex items-center justify-center h-16 bg-brand-blue">
            <i class="fas fa-bullhorn text-white text-lg"></i>
            <span class="text-white text-xl font-bold ml-2">MmsShop</span>
        </div>

        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="{{ route('home') }}"
                   class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-home mr-3"></i> Accueil du site
                </a>

                <button type="button" onclick="showSection('users', this)"
                        class="nav-btn w-full text-left flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors">
                    <i class="fas fa-users mr-3"></i> Utilisateurs
                </button>

                <button type="button" onclick="showSection('ads', this)"
                        class="nav-btn w-full text-left flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors bg-gray-700 text-white">
                    <i class="fas fa-rectangle-list mr-3"></i> Annonces
                </button>

                <div>
                    <button type="button" onclick="document.getElementById('actions-menu').classList.toggle('hidden')"
                            class="w-full text-left flex items-center justify-between px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors">
                        <span><i class="fas fa-user-gear mr-3"></i> Actions</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div id="actions-menu" class="hidden ml-8 mt-1 space-y-1">
                        <a href="{{ route('profile.edit') }}"
                           class="block text-gray-400 hover:text-white text-sm py-1.5">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block text-gray-400 hover:text-white text-sm py-1.5">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <div class="absolute bottom-4 left-4 right-4">
            <div class="bg-gray-800 rounded-lg p-4">
                <p class="text-white text-sm font-medium">{{ auth()->user()->login }}</p>
                <p class="text-gray-400 text-xs">Administrateur</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64">
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="px-6 py-4 flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Tableau de bord admin</h1>
                    <p class="text-gray-600 text-sm mt-1">Vue d'ensemble de l'activité</p>
                </div>

                <form action="{{ route('admin.index') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Rechercher une annonce..."
                           value="{{ request('search') }}"
                           class="pl-4 pr-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-brand-accent focus:border-transparent outline-none">
                    <button type="submit"
                            class="px-4 py-2 bg-brand-blue text-white rounded-r-lg hover:bg-brand-dark transition-colors">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="p-6">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- KPI -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bullhorn text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">{{ $nombre_annonce }}</p>
                        <p class="text-sm text-gray-600">Annonces totales</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">{{ $nombre_users }}</p>
                        <p class="text-sm text-gray-600">Utilisateurs inscrits</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">{{ $annonce_recentes }}</p>
                        <p class="text-sm text-gray-600">Annonces cette semaine</p>
                    </div>
                </div>
            </div>

            <!-- Section Annonces -->
            <section id="section-ads" class="table-section">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Annonces</h3>
                    </div>

                    @if($ads->isEmpty())
                        <div class="p-8 text-center text-gray-500">Aucune annonce pour le moment</div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                                    <tr>
                                        <th class="px-6 py-3 text-left">Photo</th>
                                        <th class="px-6 py-3 text-left">Titre</th>
                                        <th class="px-6 py-3 text-left">Catégorie</th>
                                        <th class="px-6 py-3 text-left">Prix</th>
                                        <th class="px-6 py-3 text-left">État</th>
                                        <th class="px-6 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($ads as $ad)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-3">
                                                @if($ad->photo)
                                                    <img src="{{ Storage::url($ad->photo) }}" class="w-14 h-14 object-cover rounded-lg">
                                                @else
                                                    <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400 text-xs">N/A</div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-3 font-medium text-gray-900">{{ $ad->title }}</td>
                                            <td class="px-6 py-3 text-gray-500">{{ $ad->category }}</td>
                                            <td class="px-6 py-3 text-brand-blue font-bold">{{ $ad->price }} €</td>
                                            <td class="px-6 py-3">
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                    {{ $ad->condition === 'new' ? 'bg-green-100 text-green-700' : '' }}
                                                    {{ $ad->condition === 'good' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                    {{ $ad->condition === 'used' ? 'bg-red-100 text-red-700' : '' }}">
                                                    {{ $ad->condition === 'new' ? 'Neuf' : ($ad->condition === 'good' ? 'Bon état' : 'Occasion') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-3">
                                                <div class="flex gap-3 text-base">
                                                    <a href="{{ route('admin.ads.show_admin', $ad) }}"
                                                       class="text-brand-blue hover:text-brand-dark" title="Voir">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('ads.destroy', $ad) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Supprimer cette annonce ?')"
                                                                class="text-red-600 hover:text-red-800" title="Supprimer">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Section Utilisateurs -->
            <section id="section-users" class="table-section hidden">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Utilisateurs</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                                <tr>
                                    <th class="px-6 py-3 text-left">#</th>
                                    <th class="px-6 py-3 text-left">Nom</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Rôle</th>
                                    <th class="px-6 py-3 text-left">Annonces</th>
                                    <th class="px-6 py-3 text-left">Inscrit le</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-3">{{ $user->id }}</td>
                                        <td class="px-6 py-3 font-medium text-gray-900">
                                            {{ $user->login }}
                                            @if($user->id === auth()->id())
                                                <span class="ml-1 text-xs text-gray-400">(vous)</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-3 text-gray-500">{{ $user->email }}</td>
                                        <td class="px-6 py-3">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                {{ $user->role === 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3 text-gray-700">{{ $user->ads_count }}</td>
                                        <td class="px-6 py-3 text-gray-400">{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-3">
                                            {{-- Un admin ne peut pas modifier/supprimer son propre compte --}}
                                            @if($user->id !== auth()->id())
                                                <div class="flex gap-3 text-base">
                                                    <a href="{{ route('admin.users.edit', $user) }}"
                                                       class="text-brand-blue hover:text-brand-dark" title="Modifier">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                onclick="return confirm('Supprimer cet utilisateur ?')"
                                                                class="text-red-600 hover:text-red-800" title="Supprimer">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-gray-300 text-xs italic">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <script>
        function showSection(name, btn) {
            // Cache toutes les sections, affiche seulement celle demandée
            document.querySelectorAll('.table-section').forEach(el => el.classList.add('hidden'));
            document.getElementById('section-' + name).classList.remove('hidden');

            // Met à jour le style actif dans la sidebar
            document.querySelectorAll('.nav-btn').forEach(el => {
                el.classList.remove('bg-gray-700', 'text-white');
                el.classList.add('text-gray-300');
            });
            btn.classList.add('bg-gray-700', 'text-white');
            btn.classList.remove('text-gray-300');
        }
    </script>
</body>
</html>