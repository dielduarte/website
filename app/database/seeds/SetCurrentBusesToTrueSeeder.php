<?php
/**
 * Created by PhpStorm.
 * User: luizpedone
 * Date: 01/07/14
 * Time: 22:26
 */

class SetCurrentBusesToTrueSeeder extends Seeder {

    public function run()
    {
        $buses = \Bus::all();

        foreach($buses as $bus) {
            $bus->active = true;
            $bus->save();
        }
    }

}