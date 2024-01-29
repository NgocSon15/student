<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(storage_path('app/public/district.csv'), 'r');

        $csv->setHeaderOffset(0); // assuming the first row contains headers

        $records = $csv->getRecords();

        foreach ($records as $record) {
            District::create([
                'id' => $record['id'],
                'province_id' => $record['province_id'],
                'name' => $record['name'],
            ]);
        }

        $this->command->info('District imported successfully.');
    }
}
