<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // inserer des donner statiqu
        // DB::table('profiles')->insert([
        //     'name'=> 'yousra',
        //     'email'=> 'essamadiyousra@gmail.com',
        //     'bio'=> 'je veux dormire maintenant'
        // ]);

        // insertion des donner
        Profile::factory(200)->create();

        // makhdamaaaax
        // DB::table('profiles')->insert([
        //     'name'=>Str::random(20),
        //     'email'=>Str::random(255).'@gmail.com',
        //     'password'=>Hash::make('password'),
        //     'bio'=>Str::random(255)
        // ]);
    }
}
