<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'hoge',
        'email' => 'hoge@example.com',
        'self_introduction' => 'hogeです',
        'gender' => 0,
        'password' => bcrypt('password'),
        'birthday' => date('2000-05-22'),
      ]);
      DB::table('users')->insert([
        'name' => 'fuga',
        'email' => 'fuga@example.com',
        'self_introduction' => 'fugaです。',
        'gender' => 0,
        'password' => bcrypt('password'),
        'birthday' => date('1995-05-22'),
      ]);
    }
}
