<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswords extends Command
{
    protected $signature = 'update:passwords';
    protected $description = 'Update existing passwords to use Bcrypt hashing';

    public function handle()
    {
        $users = User::where('name', 'a')->get();

        foreach ($users as $user) {
            $user->update([
                'password' => Hash::make('a'),
            ]);
        }

        $this->info('Passwords updated successfully!');
    }
}