<?php

namespace Database\Seeders;

use App\Enums\StorageComponent\StorageComponentType;
use App\Models\StorageComponent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageComponentSeeder extends Seeder
{
    private array $list = [
        [
            'name' => 'Мерная колба 100 мл',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Тетрабутиламмония гидроксид 30-водный',
            'type' => StorageComponentType::Liquid
        ],
        [
            'name' => 'Метанол ВЭЖХ грейд',
            'type' => StorageComponentType::Liquid
        ],
        [
            'name' => 'Метанол технический',
            'type' => StorageComponentType::Liquid
        ],
        [
            'name' => 'Динатрия гидрофосфат безводный',
            'type' => StorageComponentType::Loose
        ],
        [
            'name' => 'Натрия дигидрофосфат безводный',
            'type' => StorageComponentType::Loose
        ],
        [
            'name' => 'Мерная колба 20 мл',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Парцетамол СО',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Аминосалициловая кислота (субстанция)',
            'type' => StorageComponentType::Loose
        ],
        [
            'name' => 'Аминосалициловая кислота СО',
            'type' => StorageComponentType::Loose
        ],
        [
            'name' => 'Мерная колба 25 мл',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Колонка - 250 × 4,6 мм, силикагель октадецилсилильный для хроматографии, 5 мкм',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Воронка',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Химический стакан 200 мл',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Химический стакан 500 мл',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Мерная колба 500 мл - 2 шт',
            'type' => StorageComponentType::Stuff
        ],
        [
            'name' => 'Химическая бутыль 1000 мл',
            'type' => StorageComponentType::Stuff
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->list as $item) {
            StorageComponent::factory()->create($item);
            StorageComponent::factory()->create($item);
            StorageComponent::factory()->create($item);
            StorageComponent::factory()->create($item);
            StorageComponent::factory()->create($item);
        }
    }
}
