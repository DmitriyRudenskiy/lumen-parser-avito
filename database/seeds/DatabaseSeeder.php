<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as BaseModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaseModel::unguard();

        $this->call(TargetTableSeeder::class);

        BaseModel::reguard();
    }
}