<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    public function run()
    {
        $brandTypes = $this->brandTypes();

        foreach ($brandTypes as $brandName => $types) {
            $brand = Brand::firstOrCreate(['brand' => $brandName]);

            foreach ($types as $type) {
                if (!Phone::where('tipe', $type)->exists()) {
                    Phone::create([
                        'gambar' => fake()->imageUrl(640, 480, 'smartphone'),
                        'tipe' => $type,
                        'deskripsi' => fake()->paragraph,
                        'stok' => fake()->numberBetween(0, 150),
                        'status_stok' => null,
                        'harga' => fake()->randomFloat(2, 1000000, 30000000),
                        'brand_id' => $brand->id,
                    ]);
                }
            }
        }
    }

    private function brandTypes(): array
    {
        return [
            'Samsung' => [
                'Galaxy S20', 'Galaxy S21', 'Galaxy S22', 'Galaxy S23', 'Galaxy S24 Ultra',
                'Galaxy Note 20', 'Galaxy Note 20 Ultra',
                'Galaxy Z Fold 3', 'Galaxy Z Fold 4', 'Galaxy Z Fold 5',
                'Galaxy Z Flip 3', 'Galaxy Z Flip 4', 'Galaxy Z Flip 5',
                'Galaxy A12', 'Galaxy A32', 'Galaxy A54', 'Galaxy A14'
            ],
            'Apple' => [
                'iPhone 11', 'iPhone 12', 'iPhone 13', 'iPhone 14', 'iPhone 15',
                'iPhone 13 Pro', 'iPhone 14 Pro', 'iPhone 15 Pro Max',
                'iPhone SE 2nd Gen', 'iPhone SE 3rd Gen', 'iPhone SE 4th Gen'
            ],
            'Xiaomi' => [
                'Mi 10', 'Mi 11', 'Mi 12', 'Xiaomi 13', 'Xiaomi 14 Pro',
                'Redmi Note 9', 'Redmi Note 10', 'Redmi Note 11', 'Redmi Note 12', 'Redmi Note 13 Pro',
                'Poco F3', 'Poco X3 Pro', 'Poco F5 Pro'
            ],
            'OPPO' => [
                'Find X2 Pro', 'Find X3 Pro', 'Find X5 Pro', 'Find X6 Pro',
                'Reno 6', 'Reno 7', 'Reno 8', 'Reno 10 Pro+',
                'A53', 'A78'
            ],
            'Vivo' => [
                'X60', 'X70', 'X80', 'X100 Pro+',
                'Y20', 'Y22', 'Y36',
                'T1', 'T2 5G'
            ],
            'Realme' => [
                '8', '9', '10', '11 Pro+',
                'GT 2', 'GT 5',
                'Narzo 50', 'Narzo 60', 'Narzo 60X 5G'
            ],
            'Infinix' => [
                'Zero 5G 2020', 'Zero 5G 2022', 'Zero 5G 2025',
                'Note 10', 'Note 13 5G',
                'Hot 10', 'Hot 20'
            ],
            'Huawei' => [
                'Mate 40 Pro', 'Mate 50 Pro', 'Mate 60 Pro',
                'P40 Pro', 'P50 Pro', 'P60 Pro',
                'Nova 8', 'Nova 9', 'Nova 11 SE'
            ],
            'Asus' => [
                'ROG Phone 3', 'ROG Phone 5', 'ROG Phone 6D Ultimate', 'ROG Phone 7s',
                'Zenfone 8', 'Zenfone 9'
            ],
            'Nokia' => [
                '5.4', 'G10', 'G20', 'G60 5G',
                'X20', 'X30 5G', 'C31'
            ],
        ];
    }
}
