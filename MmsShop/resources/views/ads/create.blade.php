<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create ads</title>
    <link rel="stylesheet" href="{{ asset('css/formulaireAjout.css') }}">
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Publier une annonce</h1>

        <form method="POST" action="{{ route('ads.store') }}"
              enctype="multipart/form-data"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Titre</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border rounded px-3 py-2 mt-1">
                @error('title')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Catégorie</label>
                <select name="category" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="">-- Choisir --</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Sport">Sport</option>
                    <option value="Jeux vidéo">Jeux vidéo</option>
                    <option value="Véhicules">Véhicules</option>
                    <option value="Autre">Autre</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border rounded px-3 py-2 mt-1">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Prix (€)</label>
                <input type="number" name="price" value="{{ old('price') }}"
                       class="w-full border rounded px-3 py-2 mt-1">
                @error('price')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Localisation</label>
                <input type="text" name="location" value="{{ old('location') }}"
                       class="w-full border rounded px-3 py-2 mt-1">
                @error('location')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">État</label>
                <select name="condition" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="new">Neuf</option>
                    <option value="good">Bon état</option>
                    <option value="used">Occasion</option>
                </select>
                @error('condition')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

    <div>
    <label class="block text-sm font-medium">Photo</label>
    <input type="file" name="photo" accept="image/*"
           class="w-full border rounded px-3 py-2 mt-1">
    
   
    @error('photo')
        <p class="text-red-500 text-xs">{{ $message }}</p>
    @enderror
</div>


            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Publier
            </button>
        </form>
    </div>

</body>
</html>