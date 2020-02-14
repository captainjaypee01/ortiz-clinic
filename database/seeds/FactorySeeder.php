<?php

use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Models\Record\Service::class, 20)->create();
        factory(App\Models\Record\Branch::class, 12)->states('with_room', 'with_services')->create();
        
        factory(App\Models\Production\Category::class, 15)->create();
        factory(App\Models\Production\Product::class, 20)->states('with_categories')->create();


        factory(App\Models\Auth\User::class, 250)->states('create_transaction')->create();
    }
}
