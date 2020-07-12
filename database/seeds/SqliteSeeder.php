<?php

use Illuminate\Database\Seeder;

class SqliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = base_path() . '/database/seeds/data.sqlite';    //  convert sql to sqlite: https://ww9.github.io/mysql2sqlite/
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
