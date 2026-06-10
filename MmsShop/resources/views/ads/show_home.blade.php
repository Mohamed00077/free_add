<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
     <div class="max-w-3xl mx-auto py-8 px-4">
        <a href="{{ route('home') }}"
           class="text-blue-600 hover:underline text-sm">← Retour</a>

        <div class="bg-white rounded shadow p-6 mt-4">

            @if($ad->photo)
                <img src="{{ Storage::url($ad->photo) }}"
                     class="w-full h-64 object-cover rounded mb-4">
            @endif

            <div class="flex justify-between items-start">
                <h1 class="text-2xl font-bold">{{ $ad->title }}</h1>
                <span class="text-2xl text-blue-600 font-bold">{{ $ad->price }} €</span>
            </div>

            <div class="flex gap-2 mt-2 text-sm text-gray-500">
                <span class="bg-gray-100 px-2 py-1 rounded">{{ $ad->category }}</span>
                <span class="bg-gray-100 px-2 py-1 rounded">{{ $ad->condition }}</span>
                <span> {{ $ad->location }}</span>
            </div>

            <p class="mt-4 text-gray-700">{{ $ad->description }}</p>

            <div class="mt-4 text-sm text-gray-400">
                Publié par <strong>{{ $ad->user->login }}</strong>
            </div>
            <div class="mt-4 text-sm text-gray-400">
               contact <strong>{{ $ad->user->phone }}</strong>
            </div>

            @if(Auth::id() === $ad->user_id)
                <div class="flex gap-3 mt-6">
                    <a href="{{ route('ads.edit', $ad) }}"
                       class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                         Modifier
                    </a>
                    <form method="POST" action="{{ route('ads.destroy', $ad) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Supprimer cette annonce ?')"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            🗑 Supprimer
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div> 
</body>
</html>


  

