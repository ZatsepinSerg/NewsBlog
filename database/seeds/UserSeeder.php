<?php

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
        DB::table('users')->insert([
                [
                    'name' => 'Зацепин',
                    'email' => 'Zatsepin@accbox.info11111',
                    'password' => '$2y$10$sl/qMVN1C4GVxa3KD5I.H.VBTbRkhQ2pY7ypDOcAwWPmEUF9Vj8qS',
                    'isActive' => 1,
                    'subscriptions_count' => 5,
                    'articles_count' => 5,
                ]
            ]
        );
    }
}
