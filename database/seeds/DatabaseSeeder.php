<?php
use App\Todolist;
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
    	Todolist::unguard();
    	Todolist::truncate();
    	factory(Todolist::class, 20)->create();
    	Todolist::reguard();
    }
}
