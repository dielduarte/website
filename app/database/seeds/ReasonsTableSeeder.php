<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReasonsTableSeeder extends Seeder {

	public function run()
	{
        Reason::create(['reason' => 'Atraso']);
        Reason::create(['reason' => 'Superlotação']);
        Reason::create(['reason' => 'Itinerário não foi respeitado']);
        Reason::create(['reason' => 'Desrespeito com o usuário']);
        Reason::create(['reason' => 'Ônibus não parou no ponto']);
    }

}