<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'full_name' => 'Tanjir admin',
                'email'     => 'admin@gmail.com',
                'slug'      => Str::slug('Tanjir admin'.time()),
                'password'  =>  Hash::make('56789'),
                'image'     => '/FoodDude/frontend/img/men.jpg',
                'mobile'    => '0181000000',
                'designation'=> 'Web developer',
                'role'       => 'admin'
            ],
        ]);

        DB::table('roles')->insert([
            [
                'full_name' => 'Editor Tanjir',
                'email'     => 'editor@gmail.com',
                'slug'      => Str::slug('Editor'.time()),
                'password'  =>  Hash::make('56789'),
                'image'     => '/FoodDude/frontend/img/men1.jpg',
                'mobile'    => '0181000010',
                'designation'=> 'Editor',
                'role'       => 'editor'
            ],
        ]);
        DB::table('banners')->insert([
            [
                'title'       => 'Delicious Desert',
                'slug'        => Str::slug('Delicious-Desert'.time()),
                'description' => 'Best Desert in your  area',
                'image'       => '/FoodDude/image/banner.jpg',
                'condition'   => 'banner',
                'status'      => 'active',
            ],
        ]);
        DB::table('restaurants')->insert([
            [
                'name'        => 'SANTOOR RESTAURANT',
                'slug'        => Str::slug('SANTOOR-RESTAURANT'.time()),
                'slogan'      => 'Choose from the large selection sticky header and more',
                'image'       => '/FoodDude/image/banner.jpg',
                'mobile'      => '01800000000',
                'email'       => 'restaurant@gmail.com',
                'owner'       => 'Tanjir',
                'password'    => Hash::make('56789'),
                'status'      => 'active',
            ],
        ]);
    }
}
