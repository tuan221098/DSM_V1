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
                'name' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('123456'),
                'is_admin' => true,
                'status' => 1
            ]
        ];

        foreach ($users as $user) {
            if (!User::query()->where('username', $user['username'])->exists()) {
                User::create($user);
                echo "Add username " . $user['username'] . " successful \n";
            }
        }
    }
}
