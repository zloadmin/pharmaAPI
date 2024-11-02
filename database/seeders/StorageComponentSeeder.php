<?php

namespace Database\Seeders;

use App\Enums\StorageComponent\StorageComponentType;
use App\Models\StorageComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StorageComponentSeeder extends Seeder
{


    private array $list = [
        [
            'name'  => 'Мерная колба 100 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 20.303,
            'padding_right' => 24.739
        ],
        [
            'name'  => 'Тетрабутиламмония гидроксид 30-водный',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 21.111,
            'padding_right' => 20.677,
        ],
        [
            'name'  => 'Метанол ВЭЖХ грейд',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 21.111,
            'padding_right' => 17.083,
        ],
        [
            'name'  => 'Метанол технический',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 22.727,
            'padding_right' => 13.645,
        ],
        [
            'name'  => 'Динатрия гидрофосфат безводный',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 25.252,
            'padding_right' => 10.937,
        ],
        [
            'name'  => 'Натрия дигидрофосфат безводный',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 25.252,
            'padding_right' => 8.02,
        ],
        [
            'name'  => 'Мерная колба 20 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 25.252,
            'padding_right' => 5.729,
        ],
        [
            'name'  => 'Парцетамол СО',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 25.252,
            'padding_right' => 2.968,
        ],
        [
            'name'  => 'Аминосалициловая кислота (субстанция)',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 28.080,
            'padding_right' => 20.885,
        ],
        [
            'name'  => 'Аминосалициловая кислота СО',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 28.080,
            'padding_right' => 16.927,
        ],
        [
            'name'  => 'Мерная колба 25 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 28.080,
            'padding_right' => 13.75,
        ],
        [
            'name'  => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 26.354,
        ],
        [
            'name'  => 'Воронка',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 23.333,
        ],
        [
            'name'  => 'Химический стакан 200 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 20.885,
        ],
        [
            'name'  => 'Химический стакан 500 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 17.5,
        ],
        [
            'name'  => 'Мерная колба 500 мл - 2 шт',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 13.75,
        ],
        [
            'name'  => 'Химическая бутыль 1000 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 10,
        ],


        [
            'name'  => 'Мерная колба 100 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 56.565,
            'padding_right' => 7.031,
        ],
        [
            'name'  => 'Тетрабутиламмония гидроксид 30-водный',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 56.565,
            'padding_right' => 4.791,
        ],
        [
            'name'  => 'Метанол ВЭЖХ грейд',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 56.565,
            'padding_right' => 2.76,
        ],
        [
            'name'  => 'Метанол технический',
            'type'  => StorageComponentType::Liquid,
            'padding_top'   => 77.777,
            'padding_right' => 26.354,
        ],
        [
            'name'  => 'Динатрия гидрофосфат безводный',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 77.777,
            'padding_right' => 22.395,
        ],
        [
            'name'  => 'Натрия дигидрофосфат безводный',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 78.585,
            'padding_right' => 19.062,
        ],
        [
            'name'  => 'Мерная колба 20 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 78.585,
            'padding_right' => 13.802,
        ],
        [
            'name'  => 'Парцетамол СО',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 78.585,
            'padding_right' => 11.666,
        ],
        [
            'name'  => 'Аминосалициловая кислота (субстанция)',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 75.151,
            'padding_right' => 9.01,
        ],
        [
            'name'  => 'Аминосалициловая кислота СО',
            'type'  => StorageComponentType::Loose,
            'padding_top'   => 78.585,
            'padding_right' => 4.062,
        ],
        [
            'name'  => 'Мерная колба 25 мл',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 82.424,
            'padding_right' => 23.02,
        ],
        [
            'name'  => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 82.424,
            'padding_right' => 17.239,
        ],
        [
            'name'  => 'Воронка',
            'type'  => StorageComponentType::Stuff,
            'padding_top'   => 81.616,
            'padding_right' => 9.739,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->list as $item) {
            $item['short_name'] = Str::limit($item['name'], 15);
            StorageComponent::factory()->create($item);
        }
    }
}
