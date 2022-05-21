<?php

use Illuminate\Database\Seeder;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parties')->insert([
            'title' => 'こんにちにんにん',
            'date' => '2018-02-02T22:22',
            'address' => '滋賀県甲賀市水口町水口６１８１ 野洲川児童公園 ',
            'lat' => 34.96483502,
            'lng' => 136.16748420,
            'shopname' => 'こんにちにんにん',
            'content' => 'こんにちにんにん',
            'user_id' => 1
      ]);
      DB::table('parties')->insert([
            'title' => 'こんにちナッツ',
            'date' => '	2017/7/4T00:00',
            'address' => '〒150-0001 東京都渋谷区神宮前',
            'lat' => 35.67062600,
            'lng' => 139.70592700,
            'shopname' => 'ピーナッツくん',
            'content' => 'です！',
            'user_id' => 2
      ]);
      DB::table('parties')->insert([
            'title' => 'こんにちにんにん',
            'date' => '2018-02-02T22:22',
            'address' => '滋賀県甲賀市水口町水口６１８１ 野洲川児童公園 ',
            'lat' => 34.96483502,
            'lng' => 136.16748420,
            'shopname' => 'こんにちにんにん',
            'content' => 'こんにちにんにん',
            'user_id' => 1
      ]);
      DB::table('parties')->insert([
            'title' => 'こんにちにんにん',
            'date' => '2018-02-02T22:22',
            'address' => '滋賀県甲賀市水口町水口６１８１ 野洲川児童公園 ',
            'lat' => 34.96483502,
            'lng' => 136.16748420,
            'shopname' => 'こんにちにんにん',
            'content' => 'こんにちにんにん',
            'user_id' => 1
      ]);
      DB::table('parties')->insert([
            'title' => 'こんにちナッツ',
            'date' => '	2017/7/4T00:00',
            'address' => '〒150-0001 東京都渋谷区神宮前',
            'lat' => 35.67062600,
            'lng' => 139.70592700,
            'shopname' => 'ピーナッツくん',
            'content' => 'です！',
            'user_id' => 2
      ]);
    }
}
