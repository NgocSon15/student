<?php

namespace Database\Seeders;

use App\Constants\AppRequest;
use Illuminate\Database\Seeder;

class ProcessingPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProcessingPlaceModel::create(
            [
                'name' => 'Phòng Công tác Sinh viên'
            ]
        );
    }
}
