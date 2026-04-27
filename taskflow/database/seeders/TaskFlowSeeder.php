<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Hash;

class TaskFlowSeeder extends Seeder
{
    public function run(): void {
        // créer un utilisateur de test
       $user = User::firstOrCreate(
    ['email' => 'test@taskflow.com'],
    [
        'name'     => 'Test User',
        'password' => Hash::make('password'),
    ]
);

        // créer des catégories pour cet utilisateur
        $categories = Category::factory()
            ->count(3)
            ->create(['user_id' => $user->id]);

        // créer des tâches pour chaque catégorie
        foreach ($categories as $category) {
            Task::factory()
                ->count(5)
                ->create([
                    'user_id'     => $user->id,
                    'category_id' => $category->id,
                ]);
        }
    }
}