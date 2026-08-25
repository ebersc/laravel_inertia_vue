<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Post::query()->exists()) {
            return;
        }

        $userIds = User::query()->pluck('id');
        $categoryIds = Category::query()->pluck('id');

        if ($userIds->isEmpty() || $categoryIds->isEmpty()) {
            return;
        }

        Post::factory()
            ->count(30)
            ->state(fn (): array => [
                'user_id' => $userIds->random(),
                'category_id' => $categoryIds->random(),
            ])
            ->create();
    }
}
