<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Modifier l'annonce</h1>

        <form method="POST" action="{{ route('ads.update', $ad) }}"
              enctype="multipart/form-data"
              class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Titre</label>
                <input type="text" name="title"
                       value="{{ old('title', $ad->title) }}"
                       class="w-full border rounded px-3 py-2 mt-1">
                @error('title')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Catégorie</label>
                <select name="category" class="w-full border rounded px-3 py-2 mt-1">
                    @foreach(['Informatique','Sport','Jeux vidéo','Véhicules','Autre'] as $cat)
                        <option value="{{ $cat }}"
                            {{ old('category', $ad->category) === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border rounded px-3 py-2 mt-1">{{ old('description', $ad->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Prix (€)</label>
                <input type="number" name="price"
                       value="{{ old('price', $ad->price) }}"
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium">Localisation</label>
                <input type="text" name="location"
                       value="{{ old('location', $ad->location) }}"
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium">État</label>
                <select name="condition" class="w-full border rounded px-3 py-2 mt-1">
                    @foreach(['new' => 'Neuf', 'good' => 'Bon état', 'used' => 'Occasion'] as $val => $label)
                        <option value="{{ $val }}"
                            {{ old('condition', $ad->condition) === $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium">Nouvelle photo (optionnel)</label>
                @if($ad->photo)
                    <img src="{{ Storage::url($ad->photo) }}"
                         class="h-24 rounded mb-2">
                @endif
                <input type="file" name="photo" accept="image/*"
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Enregistrer les modifications
            </button>
        </form>
    </div>  
</body>
</html>
