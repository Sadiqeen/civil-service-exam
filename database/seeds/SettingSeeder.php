<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        DB::table('settings')->insert([
            [
                'name' => "facebook_app_id",
                'value' => "",
            ],
            [
                'name' => "facebook_app_secret",
                'value' => "",
            ],
            [
                'name' => "facebook_page_id",
                'value' => "",
            ],
            [
                'name' => "facebook_page_token",
                'value' => "",
            ],
        ]);
    }
}
