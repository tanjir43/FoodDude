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
            ],
        ]);
    }
}
