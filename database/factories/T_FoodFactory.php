<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\T_Food>
 */
class T_FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create(); // Create an instance of Faker

        // List of food names
        $foods = ['cà chua', 'nho xanh', 'mùng tơi', 'dứa', 'củ dền', 'cam', 'bơ xanh', 'bí ngô', 'khoai tây', 'hành tây', 'đậu', 'bơ', 'cà rốt', 'nấm', 'sốt cà', 'sốt trứng'];
        $categories = ['hoa quả','thực phẩm khô','rau hữu cơ'];
        // Randomly select a food name from the list
        $name = $faker->randomElement($foods);
        $category = $faker->randomElement($categories);

        return [
            'name' => strtoupper($name), // Convert food name to uppercase
            'main_img' => 'item-' . rand(1, 10) . '.jpg', // Generate a random main image
            'images' => json_encode([ // Generate a JSON array of images
                'item-' . $faker->numberBetween(1, 9) . '.jpg',
                'item-' . $faker->numberBetween(1, 9) . '.jpg',
                'item-' . $faker->numberBetween(1, 9) . '.jpg',
                'item-' . $faker->numberBetween(1, 9) . '.jpg',
                'item-' . $faker->numberBetween(1, 9) . '.jpg',
            ]),
            'old_price' => $faker->randomFloat(2, 1, 100), // Random decimal between 1 and 100 for old price
            'new_price' => $faker->randomFloat(2, 1, 100), // Random decimal between 1 and 100 for new price
            'description' => $faker->sentence, // Generate a random sentence for description
            'category' => $category,
        ];
    }
}
