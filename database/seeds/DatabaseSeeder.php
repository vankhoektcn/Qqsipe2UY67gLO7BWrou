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
        $this->call(Price_typesTableSeeder::class);
        $this->call(Price_rangesTableSeeder::class);
        $this->call(Area_rangesTableSeeder::class);
        $this->call(Incense_typesTableSeeder::class);
        $this->call(UtilitiesTableSeeder::class);

        $this->call(LanguagesTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        //$this->call(SubjectsTableSeeder::class);
        //$this->call(TeachTimesTableSeeder::class);
        $this->call(NavigationCategoriesTableSeeder::class);

        $this->call(Project_typesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(Product_typesTableSeeder::class);
        $this->call(AgentsTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(StreetsTableSeeder::class);

        $this->call(ArticlesTableSeeder::class);
        
        Model::reguard();
    }
}
