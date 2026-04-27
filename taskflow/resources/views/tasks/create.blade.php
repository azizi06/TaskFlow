<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <label class="block mb-2">Titre *</label>
            <input type="text" name="title" required class="w-full border p-2 mb-4">

            <label class="block mb-2">Catégorie</label>
            <select name="category_id" class="w-full border p-2 mb-4">
                <option value="">Aucune</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Priorité</label>
            <select name="priority" class="w-full border p-2 mb-4">
                <option value="basse">Basse</option>
                <option value="moyenne" selected>Moyenne</option>
                <option value="haute">Haute</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
        </form>
    </div>
</x-app-layout>