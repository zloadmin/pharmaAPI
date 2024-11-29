<?php

namespace Database\Seeders;

use App\Enums\Component\ComponentType;
use App\Enums\SessionComponent\SessionComponentPlace;
use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComponentSeeder extends Seeder
{


    private array $list = [
        [
            'name'            => 'Шпатель сух',
            'type'            => ComponentType::Loose,
            'padding_top'     => 82.424,
            'padding_right'   => 23.02,
            'on_scales_place' => SessionComponentPlace::onScalesBottomBox,
            'weight'          => 0,
            'image'           => 'storage_components/spatula.png',
        ],

        [
            'name'            => 'Воронка жид',
            'type'            => ComponentType::Liquid,
            'padding_top'     => 78.585,
            'padding_right'   => 19.062,
            'on_scales_place' => SessionComponentPlace::onScalesBottomBox,
            'weight'          => 0,
            'image'           => 'storage_components/funnel.png',
        ],
        [
            'name'            => 'Колба сух',
            'type'            => ComponentType::Loose,
            'padding_top'     => 56.565,
            'padding_right'   => 26.354,
            'on_scales_place' => SessionComponentPlace::onScalesLeftBox,
            'weight'          => 10,
            'image'           => 'storage_components/measuring_cylinder_075.png',
        ],
        [
            'name'            => 'Колба жид',
            'type'            => ComponentType::Liquid,
            'padding_top'     => 56.565,
            'padding_right'   => 17.5,
            'on_scales_place' => SessionComponentPlace::onScalesLeftBox,
            'weight'          => 10,
            'image'           => 'storage_components/volumetric_flask.png',
        ],
        [
            'name'            => 'Реактив сух',
            'type'            => ComponentType::Loose,
            'padding_top'     => 21.111,
            'padding_right'   => 20.677,
            'on_scales_place' => SessionComponentPlace::onScalesRightBox,
            'weight'          => 0,
            'image'           => 'storage_components/boric_acid.png',
        ],
        [
            'name'            => 'Реактив жид',
            'type'            => ComponentType::Liquid,
            'padding_top'     => 20.303,
            'padding_right'   => 24.739,
            'on_scales_place' => SessionComponentPlace::onScalesRightBox,
            'weight'          => 0,
            'image'           => 'storage_components/chemical_closed.png',
        ],



                [
                    'name'            => 'Метанол ВЭЖХ грейд',
                    'type'            => ComponentType::Liquid,
                    'padding_top'     => 21.111,
                    'padding_right'   => 17.083,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Метанол технический',
                    'type'            => ComponentType::Liquid,
                    'padding_top'     => 22.727,
                    'padding_right'   => 13.645,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Динатрия гидрофосфат безводный',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 25.252,
                    'padding_right'   => 10.937,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Натрия дигидрофосфат безводный',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 25.252,
                    'padding_right'   => 8.02,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Мерная колба 20 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 25.252,
                    'padding_right'   => 5.729,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Парцетамол СО',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 25.252,
                    'padding_right'   => 2.968,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Аминосалициловая кислота (субстанция)',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 28.080,
                    'padding_right'   => 20.885,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Аминосалициловая кислота СО',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 28.080,
                    'padding_right'   => 16.927,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Мерная колба 25 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 28.080,
                    'padding_right'   => 13.75,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],

                [
                    'name'            => 'Воронка',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 56.565,
                    'padding_right'   => 23.333,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Химический стакан 200 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 56.565,
                    'padding_right'   => 20.885,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],

                [
                    'name'            => 'Мерная колба 500 мл - 2 шт',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 56.565,
                    'padding_right'   => 13.75,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Химическая бутыль 1000 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 56.565,
                    'padding_right'   => 10,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],


                [
                    'name'            => 'Мерная колба 100 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 56.565,
                    'padding_right'   => 7.031,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Тетрабутиламмония гидроксид 30-водный',
                    'type'            => ComponentType::Liquid,
                    'padding_top'     => 56.565,
                    'padding_right'   => 4.791,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Метанол ВЭЖХ грейд',
                    'type'            => ComponentType::Liquid,
                    'padding_top'     => 56.565,
                    'padding_right'   => 2.76,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Метанол технический',
                    'type'            => ComponentType::Liquid,
                    'padding_top'     => 77.777,
                    'padding_right'   => 26.354,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Динатрия гидрофосфат безводный',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 77.777,
                    'padding_right'   => 22.395,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Мерная колба 20 мл',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 78.585,
                    'padding_right'   => 13.802,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Парцетамол СО',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 78.585,
                    'padding_right'   => 11.666,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Аминосалициловая кислота (субстанция)',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 75.151,
                    'padding_right'   => 9.01,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Аминосалициловая кислота СО',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 78.585,
                    'padding_right'   => 4.062,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],

                [
                    'name'            => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 82.424,
                    'padding_right'   => 17.239,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
                [
                    'name'            => 'Воронка',
                    'type'            => ComponentType::Loose,
                    'padding_top'     => 81.616,
                    'padding_right'   => 9.739,
                    'on_scales_place' => SessionComponentPlace::onScalesLeftBox, 'weight' => 0,
                ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->list as $key => $item) {

            $item['name'] = $key;
            $item['short_name'] = $key;
            Component::factory()->create($item);
        }
    }
}
