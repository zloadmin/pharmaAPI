<?php

namespace App\Console\Commands\Component;

use App\Enums\Component\ComponentNamingType;
use App\Models\Component;
use Illuminate\Console\Command;

class ComponentSetNamingType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:component-set-naming-type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private array $names = [
        // Вспомогательная посуда
        'Шпатель'                             => ComponentNamingType::AdditionalGlassware,
        'Воронка мал'                         => ComponentNamingType::AdditionalGlassware,
        'Воронка большая'                     => ComponentNamingType::AdditionalGlassware,
        'Воронка средняя'                     => ComponentNamingType::AdditionalGlassware,
        'Воронка маленькая'                   => ComponentNamingType::AdditionalGlassware,
        'Шприц для ввода'                     => ComponentNamingType::AdditionalGlassware,
        //        'Воронка средняя'                     => ComponentNamingType::AdditionalGlassware,
        //        'Воронка Большая'                     => ComponentNamingType::AdditionalGlassware,
        'Воронка малая'                       => ComponentNamingType::AdditionalGlassware,
        // Посуда
        'Бюкс'                                => ComponentNamingType::SimpleGlassware,
        'Химический стакан 50 мл'             => ComponentNamingType::SimpleGlassware,
        'Мерная колба 10 мл'                  => ComponentNamingType::SimpleGlassware,
        'Мерная колба 20 мл'                  => ComponentNamingType::SimpleGlassware,
        'Мерная колба 50 мл'                  => ComponentNamingType::SimpleGlassware,
        'Мерная колба 100 мл'                 => ComponentNamingType::SimpleGlassware,
        'Мерная колба 1000 мл'                => ComponentNamingType::SimpleGlassware,
        'Химический стакан 200 мл'            => ComponentNamingType::SimpleGlassware,
        'Мерный цилиндр 10 мл'                => ComponentNamingType::SimpleGlassware,
        'Мерный цилиндр 25 мл'                => ComponentNamingType::SimpleGlassware,
        'Мерный цилиндр'                      => ComponentNamingType::SimpleGlassware,
        'Мерная колба 25 мл'                  => ComponentNamingType::SimpleGlassware,
        'Мерная колба 200 мл'                 => ComponentNamingType::SimpleGlassware,
        'Мерная колба 200 мл'                 => ComponentNamingType::SimpleGlassware,
        'Мерный цилиндр 250 мл'               => ComponentNamingType::SimpleGlassware,
        'Мерный цилиндр 100 мл'               => ComponentNamingType::SimpleGlassware,
        // ЛС
        'Бикалутамид СО'                      => ComponentNamingTYpe::LS,
        'Бикалутамид субстанция'              => ComponentNamingTYpe::LS,
        'Молнупиравир СО'                     => ComponentNamingTYpe::LS,
        'Молнупиравир субстанция'             => ComponentNamingTYpe::LS,
        'Молнупиравир субст'                  => ComponentNamingTYpe::LS,
        'Бикалутамид, субстанция'             => ComponentNamingTYpe::LS,
        'Дарунавир'                           => ComponentNamingTYpe::LS,
        'Дарунавир СО'                        => ComponentNamingTYpe::LS,
        'Дарунавир субстанция'                => ComponentNamingTYpe::LS,
        'Лозартан калия субстанция'           => ComponentNamingTYpe::LS,
        'Лозартан калия СО'                   => ComponentNamingTYpe::LS,
        'Аминосалициловая кислота субстанция' => ComponentNamingTYpe::LS,
        'СО Аминосалициловая кислота'         => ComponentNamingTYpe::LS,
        'СО примеси Е'                        => ComponentNamingTYpe::LS,
        'СО примеси Д'                        => ComponentNamingTYpe::LS,
        'Трифенилметанол'                     => ComponentNamingTYpe::LS,
        'Парацетамол'                         => ComponentNamingTYpe::LS,
        'Аминофенол'                          => ComponentNamingTYpe::LS,
        'Месалазин'                           => ComponentNamingTYpe::LS,
        // Реактивы
        'Трифторуксусная кислота'             => ComponentNamingType::Reagents,
        'Фосфорная кислота'                   => ComponentNamingType::Reagents,
        'Хлористоводородная кислота'          => ComponentNamingType::Reagents,
        'Хлористоводородная  кислота'         => ComponentNamingType::Reagents,
        'Хлорная кислота'                     => ComponentNamingType::Reagents,
        'Натрия гидроксид'                    => ComponentNamingType::Reagents,
        'Калия дигидрофосфат'                 => ComponentNamingType::Reagents,
        'Дикалия гидрофосфат'                 => ComponentNamingType::Reagents,
        'Тетрабутиламмония гидроксид'         => ComponentNamingType::Reagents,
        'Динатрия гидрофосфат 0,05М (ж)'      => ComponentNamingType::Reagents,
        'Натрия дигидрофосфат 0,05М (ж)'      => ComponentNamingType::Reagents,
        // Растворители
        'Ацетонитрил'                         => ComponentNamingType::Solvents,
        'Метанол'                             => ComponentNamingType::Solvents,
        'Метанол технический'                 => ComponentNamingType::Solvents,
        'Вода'                                => ComponentNamingType::Solvents,
        'Дестилированная вода'                => ComponentNamingType::Solvents,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $components = Component::query()->pluck('name', 'id')->toArray();
        $notFound = $components;
        foreach ($components as $componentID => $componentName) {
            foreach ($this->names as $name => $type) {
                if (self::compareName($componentName, $name)) {
                    Component::where('id', $componentID)
                        ->update(['naming_type' => $type->value]);
                } else {
//                    $this->info($componentName . ' != ' . $name);
                }
            }
        }

    }

    static function compareName($componentName, $currentName)
    {

        return trim(mb_strtolower($componentName)) == trim(mb_strtolower($currentName));
    }
}
