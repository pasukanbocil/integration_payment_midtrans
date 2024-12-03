<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Lenovo IdeaPad 3 RAM 8GB SSD 512GB',
                'description' => 'Laptop Lenovo IdeaPad 3 14IML05 81WA00JVID - Intel Core i3-10110U - RAM 8GB - SSD 512GB - Intel UHD Graphics - 14" FHD - Windows 10 - Platinum Grey',
                'price' => 5800000,
                'stock' => 10,
                'image' => 'https://images.tokopedia.net/img/cache/900/VqbcmM/2024/9/4/cc38f6d8-4e1d-4045-97b5-42c5ed449f03.jpg'
            ],
            [
                'name' => 'LENOVO LOQ 15 I5 12450HX RTX3050 12GB 512GB W11+OHS 15.6FHD 100SRGB - NON BUNDLE, 12GB',
                'description' => 'LENOVO LOQ 15 I5 12450HX RTX3050 6GB/ 12/20GB 512GB W11+OHS 15.6FHD 144HZ 100SRGB BLIT 2Y+ADP GRY -1JID',
                'price' => 11849000,
                'stock' => 10,
                'image' => 'https://images.tokopedia.net/img/cache/900/VqbcmM/2024/3/1/5ca90c39-fc8a-4fcc-86c2-6e56cef4ea0f.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
