<x-app-layout>
    <div class="max-w-7xl mx-auto py-8">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4 inline-block">+ Nouvelle Tâche</a>
        
        <div class="bg-white shadow rounded p-4">
            <ul>
                @foreach ($tasks as $task)
                    <li class="border-b p-2 flex justify-between">
                        <span>{{ $task->title }} - <b>{{ $task->status }}</b></span>
                        <span class="text-gray-500">{{ $task->category ? $task->category->name : 'Sans catégorie' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>