<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'super admin']);
        $adminRole = Role::create(['name' => 'admin']);

        $user = Unit::query()
            ->updateOrCreate(
                ['email' => 'dt001@nl.com'],
                ['password' => bcrypt('123')],
            );
    }
}
