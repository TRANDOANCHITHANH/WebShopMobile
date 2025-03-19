<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::insert([
            [
                'name' => 'Xanh',
            ],
            [
                'name' => 'Xám',
            ],
            [
                'name' => 'Đen',
            ],
            [
                'name' => 'Đỏ',
            ],
            [
                'name' => 'Trắng',
            ],
            [
                'name' => 'Trắng-Bạc',
            ],
            [
                'name' => 'Titan Trắng',
            ],
            [
                'name' => 'Titan Sa Mạc',
            ],
            [
                'name' => 'Titan Đen',
            ],
            [
                'name' => 'Titan Tự Nhiên',
            ],
            [
                'name' => 'Hồng',
            ],
        ]);
    }
}
