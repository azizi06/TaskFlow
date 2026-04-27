<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tableau de bord</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4">
            <div class="bg-white p-6 rounded shadow w-1/3">
                <h3 class="font-bold">Tâches du jour</h3>
                <p class="text-3xl text-blue-600">{{ $tasksTodayCount }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow w-1/3">
                <h3 class="font-bold">En retard</h3>
                <p class="text-3xl text-red-600">{{ $lateTasksCount }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow w-1/3">
                <h3 class="font-bold">Progression</h3>
                <p class="text-3xl text-green-600">{{ $progressPercentage }}%</p>
            </div>
        </div>
    </div>
</x-app-layout>