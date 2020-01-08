<?php

use Illuminate\Database\Seeder;

class VocaTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('voca_type')->insert([
            [
                'type_name' => 'Noun',
                'type_abbre' => 'N',
                'type_vi' => 'Danh từ'
            ],
            [
                'type_name' => 'Verb',
                'type_abbre' => 'V',
                'type_vi' => 'Động từ'
            ],
            [
                'type_name' => 'Adjective',
                'type_abbre' => 'Adj',
                'type_vi' => 'Tính từ'
            ],
            [
                'type_name' => 'Adverb',
                'type_abbre' => 'Adv',
                'type_vi' => 'Trạng từ'
            ],
            [
                'type_name' => 'Preposition',
                'type_abbre' => 'Pre',
                'type_vi' => 'Giới từ'
            ],
        ]);
    }
}
