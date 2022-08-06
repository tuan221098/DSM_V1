<?php

use App\Models\User;
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
        $users = [
            [
                'username' => 'admin',
                'first_name' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'is_admin' => true,
            ]
        ];

        foreach ($users as $user) {
            if (!User::query()->where('username', $user['username'])->exists()) {
                User::create($user);
                echo "Added username " . $user['username'] . " success \n";
            }
        }
    }
}
