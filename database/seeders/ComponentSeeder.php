<?php

namespace Database\Seeders;

use App\Enums\Component\ComponentType;
use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComponentSeeder extends Seeder
{


    private array $list = [
        [
            'name'           => 'Мерная колба 100 мл',
            'type'           => ComponentType::Stuff,
            'padding_top'    => 20.303,
            'padding_right'  => 24.739,
            'main_component' => true, 'additional_component' => false,
        ],
//        [
//            'name'           => 'Тетрабутиламмония гидроксид 30-водный',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 21.111,
//            'padding_right'  => 20.677,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Метанол ВЭЖХ грейд',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 21.111,
//            'padding_right'  => 17.083,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Метанол технический',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 22.727,
//            'padding_right'  => 13.645,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Динатрия гидрофосфат безводный',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 25.252,
//            'padding_right'  => 10.937,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Натрия дигидрофосфат безводный',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 25.252,
//            'padding_right'  => 8.02,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Мерная колба 20 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 25.252,
//            'padding_right'  => 5.729,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Парцетамол СО',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 25.252,
//            'padding_right'  => 2.968,
//            'main_component' => true, 'additional_component' => false,
//        ],
        [
            'name'           => 'Аминосалициловая кислота (субстанция)',
            'type'           => ComponentType::Loose,
            'padding_top'    => 28.080,
            'padding_right'  => 20.885,
            'main_component' => true, 'additional_component' => false,
        ],
//        [
//            'name'           => 'Аминосалициловая кислота СО',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 28.080,
//            'padding_right'  => 16.927,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Мерная колба 25 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 28.080,
//            'padding_right'  => 13.75,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 26.354,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Воронка',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 23.333,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Химический стакан 200 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 20.885,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Химический стакан 500 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 17.5,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Мерная колба 500 мл - 2 шт',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 13.75,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Химическая бутыль 1000 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 10,
//            'main_component' => true, 'additional_component' => false,
//        ],
//
//
//        [
//            'name'           => 'Мерная колба 100 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 56.565,
//            'padding_right'  => 7.031,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Тетрабутиламмония гидроксид 30-водный',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 56.565,
//            'padding_right'  => 4.791,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Метанол ВЭЖХ грейд',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 56.565,
//            'padding_right'  => 2.76,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Метанол технический',
//            'type'           => ComponentType::Liquid,
//            'padding_top'    => 77.777,
//            'padding_right'  => 26.354,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Динатрия гидрофосфат безводный',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 77.777,
//            'padding_right'  => 22.395,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Натрия дигидрофосфат безводный',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 78.585,
//            'padding_right'  => 19.062,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Мерная колба 20 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 78.585,
//            'padding_right'  => 13.802,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Парцетамол СО',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 78.585,
//            'padding_right'  => 11.666,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Аминосалициловая кислота (субстанция)',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 75.151,
//            'padding_right'  => 9.01,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Аминосалициловая кислота СО',
//            'type'           => ComponentType::Loose,
//            'padding_top'    => 78.585,
//            'padding_right'  => 4.062,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Мерная колба 25 мл',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 82.424,
//            'padding_right'  => 23.02,
//            'main_component' => true, 'additional_component' => false,
//        ],
//        [
//            'name'           => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
//            'type'           => ComponentType::Stuff,
//            'padding_top'    => 82.424,
//            'padding_right'  => 17.239,
//            'main_component' => true, 'additional_component' => false,
//        ],
        [
            'name'           => 'Воронка',
            'type'           => ComponentType::Stuff,
            'padding_top'    => 81.616,
            'padding_right'  => 9.739,
            'main_component' => false, 'additional_component' => true,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->list as $item) {
            $item['short_name'] = Str::limit($item['name'], 15);
            Component::factory()->create($item);
        }
    }
}
