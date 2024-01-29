<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(storage_path('app/public/province.csv'), 'r');

        $csv->setHeaderOffset(0); // assuming the first row contains headers

        $records = $csv->getRecords();

        foreach ($records as $record) {
            Province::create([
                'id' => $record['id'],
                'name' => $record['name'],
            ]);
        }

        $this->command->info('Province imported successfully.');
    }
}
