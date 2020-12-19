<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Item;
use App\Review;
use App\Tag;
use App\User;
use App\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $faker = \Faker\Factory::create();

        Category::insert([
        	[
        		'name' => 'Trousers',
        		'created_at' => now(),
        		'updated_at' => now()
        	],
        	[
        		'name' => 'Sweatpants',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Dresses',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Skirts',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'T-Shirts',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Shirts',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Sweaters',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Jackets',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Sneakers',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Shoes',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Boots',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        	[
        		'name' => 'Handbags',
	        	'created_at' => now(),
	        	'updated_at' => now()
        	],
        ]);

        User::insert([
            'name' => 'Admin',
            'first_name' => '',
            'last_name' => '',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'phone' => '',
            'postal_code' => '',
            'city' => '',
            'address' => '',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(Item::class, 203)->create();
        factory(Review::class, 150)->create();
        factory(Tag::class, 100)->create();
        factory(User::class, 150)->create();
        factory(Order::class, 150)->create();
        
        for($i=0;$i<300;$i++) {
            DB::table('item_tag')->insert([
                'item_id' => Item::all()->random()->id,
                'tag_id' => Tag::all()->random()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for($i=0;$i<300;$i++) {
            $order_id = Order::all()->random()->id;
            $item = Item::all()->random();
            $quantity = $faker->numberBetween(1,10);

            DB::table('item_order')->insert([
                'item_id' => $item->id,
                'order_id' => $order_id,
                'quantity' => $quantity,
                'sum' => $item->price*$quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
