<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            self::seedUsers();
            $this->command->info("Semilla users usada");
    }

    public function seedUsers(){
        $u = new User;
        $u->email = "jordi3@gmail.com";
        $u->name = "jordi";
        $u->password = "12345678";
        $u2 = new User;
        $u2->email = "jordi2@gmail.com";
        $u2->name = "jordi2";
        $u2->password = "123456784";
        $u->save();
        $u2->save();
    }
}
