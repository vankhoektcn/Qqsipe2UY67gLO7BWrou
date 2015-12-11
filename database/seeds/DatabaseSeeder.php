<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(LanguagesTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TeachTimesTableSeeder::class);
        $this->call(NavigationCategoriesTableSeeder::class);

        Model::reguard();
    }
}
