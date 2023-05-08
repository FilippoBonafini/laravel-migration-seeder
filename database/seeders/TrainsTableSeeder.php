<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        DB::table('trains')->truncate();

        for ($i = 0; $i < 50; $i++) {
            $newTrain = new Train();
            $newTrain->azienda = $faker->company();
            $newTrain->stazione_partenza = $faker->city;
            $newTrain->stazione_arrivo = $faker->city;
            $newTrain->orario_partenza = $faker->dateTimeBetween('-1 month', '+1 month');
            $newTrain->orario_arrivo = $faker->dateTimeBetween('-1 month', '+1 month');
            $newTrain->codice_treno = $faker->unique()->randomNumber(5);
            $newTrain->n_vagoni = $faker->numberBetween(1, 10);
            $newTrain->ritardo_treno = $faker->numberBetween(0, 1);
            $newTrain->cancellato_treno = $faker->numberBetween(0, 1);
            $newTrain->save();
        }
    }
}
