<?php

use Illuminate\Database\Seeder;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=SqlSeeder
     * @return void
     */
    public function run()
    {
        //
        $path = base_path() . '/database/seeds/data.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
