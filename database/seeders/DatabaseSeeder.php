<?php

namespace Database\Seeders;

use App\Models\Resort;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::factory()->count(2)->create();
        Resort::factory()->count(10)->create();
        
    }
}
