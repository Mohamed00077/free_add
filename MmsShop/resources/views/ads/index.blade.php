<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <div class="max-w-7xl mx-auto py-8 px-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
                    <a href="{{ route('admin.index') }}"
           class="text-blue-600 hover:underline text-sm">← Retour</a>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Toutes les annonces</h1>
            @auth
                <a href="{{ route('ads.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Publier une annonce
                </a>
            @endauth
        </div>

        <div class="space-y-4">
            @forelse($ads as $ad)
                <div class="border rounded-lg p-4 flex gap-4 bg-white shadow-sm">

                    @if($ad->photo)
                        <img src="{{ Storage::url($ad->photo) }}"
                             class="w-32 h-32 object-cover rounded">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                            No photo
                        </div>
                    @endif

                    <div class="flex-1">
                        <div class="flex justify-between">
                            <a href="{{ route('ads.show', $ad) }}"
                               class="text-lg font-semibold hover:underline">
                                {{ $ad->title }}
                            </a>
                            <span class="text-blue-600 font-bold">{{ $ad->price }} €</span>
                        </div>
                        <span class="text-xs text-gray-500 uppercase">{{ $ad->category }}</span>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($ad->description, 100) }}</p>
                        <div class="text-xs text-gray-400 mt-2">
                            📍 {{ $ad->location }} — Par <strong>{{ $ad->user->login }}</strong>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Aucune annonce pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $ads->links() }}
        </div>
    </div> 
</body>
</html>
