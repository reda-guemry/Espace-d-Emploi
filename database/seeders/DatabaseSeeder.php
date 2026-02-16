<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        User::factory(5)->create()->each(function ($user) {

            $randomRole = collect(['candidate', 'recruiter'])->random();
            $user->assignRole($randomRole);
        });

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'profile_photo' => 'default_profile.jpg',
            'cover_photo' => 'default_cover.png',
        ]);

        $admin->assignRole('recruiter');

        $this->call([
            VacancieSeeder::class , 
        ]);


    }
}
