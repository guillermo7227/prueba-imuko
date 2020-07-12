<?php

use App\User;
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
        User::unsetEventDispatcher();

        factory(User::class)->create([
            'name' => 'Evaluador Imuko',
            'email' => 'evaluador@imuko.com',
        ]);

        factory(User::class, 20)->create();
    }
}
