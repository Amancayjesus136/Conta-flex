<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jesus Amancay',
            'email' => 'amancayjesus136@gmail.com',
            'password' => bcrypt('Botasyalex2702')
        ])->assignRole('superadministrador');
            
        User::factory(9)->create();    
    }
}
