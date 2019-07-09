<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateTablesSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeed::class);
        $this->call(RegionTableSeeder::class);
        $this->call(RegionImagesTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(TourTypesTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(TourImagesTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(CarDriverTableSeeder::class);
        $this->call(CarDriverSliderImagesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsImagesTableSeeder::class);
        $this->call(ResidenceTableSeeder::class);
        $this->call(ResidenceImagesTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(RestaurantImagesTableSeeder::class);
        $this->call(RoomTypesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(SettingTableSeed::class);
        $this->call(VacancyTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
    }
}
