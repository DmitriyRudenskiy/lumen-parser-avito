<?php

use Illuminate\Database\Seeder;
use App\Models\Target;

class TargetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'url' => 'https://www.avito.ru/novosibirsk/noutbuki?bt=0&q=macbook&view=list',
            'name' => 'Macbook',
            'description' => 'macbook:  Все объявления в Новосибирске/Бытовая электроника/Ноутбуки',
        ];

        Target::forceCreate($data);

        $data = [
            'url' => 'https://www.avito.ru/novosibirsk/nastolnye_kompyutery?bt=0&q=mac+mini&view=list',
            'name' => 'Mac mini',
            'description' => 'mac mini:   Все объявления в Новосибирске/Бытовая электроника/Настольные компьютеры',
        ];

        Target::forceCreate($data);
    }
}