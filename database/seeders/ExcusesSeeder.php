<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excuse;

class ExcusesSeeder extends Seeder
{
    public function run()
    {
        $excuses = [
            'Sans excuse',
            'CM',
            'Covid19',
            'Feuille de soin',
            'Convocation',
            'Permis de conduire',
            'Avis de décès',
            'Vacances',
            'AUT',
            'Date de traitement',
        ];

        foreach ($excuses as $excuse) {
            Excuse::create([
                'excuse_type' => $excuse
            ]);
        }
    }
}
