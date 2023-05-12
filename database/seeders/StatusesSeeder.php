<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            'normal',
            '1er mise',
            '2eme mise',
            'blame',
            'excl 2jr',
            'excl temp',
            'excl df',
        ];

        foreach ($statuses as $status) {
            Status::create([
                'status_nom' => $status
            ]);
        }
    }
}
