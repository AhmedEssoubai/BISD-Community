<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Groupe;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group1 = Groupe::create([
            'label' => 'Groupe 1',
            'etat' => 'private',
            'icon' => 'default.png'
        ]);
        $group2 = Groupe::create([
            'label' => 'Groupe 1',
            'etat' => 'private',
            'icon' => 'default.png'
        ]);
        $group3 = Groupe::create([
            'label' => 'Groupe 1',
            'etat' => 'private',
            'icon' => 'default.png'
        ]);

        $user = User::forceCreate([
            'nom' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('123456789'),
            'api_token' => Str::random(80)
        ]);
        $user->groupe()->attach([
            $group1->id => ['type' => 'normale'],
            $group2->id => ['type' => 'admin'],
        ]);
    }
}
