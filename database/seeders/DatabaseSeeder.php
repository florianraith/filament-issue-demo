<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Tenant::insert([
            ['name' => 'Tenant 1'],
            ['name' => 'Tenant 2'],
        ]);

        Tag::insert([
            ['name' => 'Tag 1 Tenant 1', 'tenant_id' => 1],
            ['name' => 'Tag 2 Tenant 1', 'tenant_id' => 1],
            ['name' => 'Tag 3 Tenant 1', 'tenant_id' => 1],
            ['name' => 'Tag 1 Tenant 2', 'tenant_id' => 2],
            ['name' => 'Tag 2 Tenant 2', 'tenant_id' => 2],
            ['name' => 'Tag 3 Tenant 2', 'tenant_id' => 2],
        ]);

        Post::create([
            'title' => 'Post 1 Tenant 1',
            'tenant_id' => 1,
        ])->tags()->attach([1, 2]);

        Post::create([
            'title' => 'Post 2 Tenant 1',
            'tenant_id' => 1,
        ])->tags()->attach([2, 3]);

        Post::create([
            'title' => 'Post 1 Tenant 2',
            'tenant_id' => 2,
        ])->tags()->attach([4, 5]);

        Post::create([
            'title' => 'Post 2 Tenant 2',
            'tenant_id' => 2,
        ])->tags()->attach([5, 6]);
    }
}
