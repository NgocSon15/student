<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(storage_path('app/public/ward.csv'), 'r');

        $csv->setHeaderOffset(0); // assuming the first row contains headers

        $records = $csv->getRecords();

        foreach ($records as $record) {
            Ward::create([
                'id' => $record['id'],
                'district_id' => $record['district_id'],
                'name' => $record['name'],
            ]);
        }

        $this->command->info('Ward imported successfully.');
    }
}
