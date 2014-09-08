<?php
class ScoreController extends \BaseController
{
    public function form($line)
    {
        $bus = \Bus::whereLine($line)->first();

        if ($bus) {
            return \View::make('score.form', compact('bus'));
        }

        App::error('404');
    }

    public function store($line)
    {
        $data = \Input::all();

        $bus = Bus::whereLine($line)->active()->first();

        if ($bus) {
            $validation = \Score::validate($data);

            if ($validation->fails()) {

                return \Redirect::route('score.form', [$line])
                    ->withErrors($validation)
                    ->withInput();
            }

            $finalScore = ($data['comfort'] + $data['punctuality'] + $data['customer_service'] + $data['route'] + $data['cost_benefit']) / 5;

            \Score::create([
                'bus_id'            => $bus->id,
                'user_name'         => $data['user_name'],
                'email'             => $data['email'],
                'score'             => $finalScore,
                'comfort'           => $data['comfort'],
                'punctuality'       => $data['punctuality'],
                'customer_service'  => $data['customer_service'],
                'route'             => $data['route'],
                'cost_benefit'      => $data['cost_benefit']
            ]);

            return \Redirect::route('bus.index', [$bus->line])
                            ->with('message', 'A sua avaliação foi registrada com sucesso!')
                            ->with('score', $finalScore);
        }

        App::error('404');
    }
} 