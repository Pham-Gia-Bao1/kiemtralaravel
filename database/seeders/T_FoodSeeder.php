<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\T_FoodFactory;
class T_FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'name' => 'NHo Xanh',
                'images' => json_encode(['burger.jpg']), // Ví dụ, đường dẫn đến hình ảnh của burger
                'old_price' => 5.99,
                'new_price' => 4.99,
                'description' => 'A delicious burger with cheese and bacon.',
                'category' => 'hoa quả'

            ],
        ];
        $factories = new T_FoodFactory();
        for ($i = 0; $i <  10 ; $i++) {
            DB::table('T_Food')->insert($factories->definition());
        }
    }
}
