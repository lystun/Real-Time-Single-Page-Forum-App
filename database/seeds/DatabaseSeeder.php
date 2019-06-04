<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\User', 10)->create();
        factory('App\Category', 5)->create();
        factory('App\Question', 10)->create();
        factory('App\Reply', 50)->create()->each(function($reply){
            return $reply->likes()->save(factory('App\Like')->make());
        });
    }
}
