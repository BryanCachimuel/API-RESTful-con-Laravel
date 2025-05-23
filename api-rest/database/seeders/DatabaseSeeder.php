<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Lennin BCL',
            'email' => 'lbcl@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        Task::factory(100)->create([
            'user_id' => $user->id,
        ]);

        Category::factory(10)->create();
        Post::factory(100)->create();
        Tag::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        $user->roles()->attach(1);
    }
}
