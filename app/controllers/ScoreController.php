<?php
class ScoreController extends \BaseController
{
    public function form($line = null)
    {
        $bus = \Bus::whereLine($line)->first();

        return \View::make('score.form', compact('bus'));
    }

    public function store($line = null)
    {
        $data = filter_var_array(\Input::all(), [
            'user_name'         => FILTER_SANITIZE_STRING,
            'email'             => FILTER_SANITIZE_EMAIL,
            'bus_id'            => FILTER_SANITIZE_NUMBER_INT,
            'comfort'           => FILTER_SANITIZE_STRING,
            'punctuality'       => FILTER_SANITIZE_STRING,
            'customer_service'  => FILTER_SANITIZE_STRING,
            'route'             => FILTER_SANITIZE_STRING,
            'cost_benefit'      => FILTER_SANITIZE_STRING
        ]);

        $validation = \Score::validate($data);

        if ($validation->fails()) {

            return \Redirect::route('score.form', [$line])
                ->withErrors($validation)
                ->withInput();
        }

        $finalScore = ($data['comfort'] + $data['punctuality'] + $data['customer_service'] + $data['route'] + $data['cost_benefit']) / 5;

        $score = \Score::create([
            'bus_id'            => $data['bus_id'],
            'user_name'         => $data['user_name'],
            'email'             => $data['email'],
            'score'             => $finalScore,
            'comfort'           => $data['comfort'],
            'punctuality'       => $data['punctuality'],
            'customer_service'  => $data['customer_service'],
            'route'             => $data['route'],
            'cost_benefit'      => $data['cost_benefit']
        ]);

        return \Redirect::route('score.result', [$score->id])
                        ->with('message', 'A sua avaliação foi registrada com sucesso!')
                        ->with('score', $finalScore);
    }

    public function result($scoreId)
    {
        $score = \Score::find($scoreId);


        if ($score) {
            $bus = \Bus::find($score->bus_id);

            $averages = \Score::whereBusId($bus->id)->first([
                \DB::raw('avg(comfort) as comfort'),
                \DB::raw('avg(punctuality) as punctuality'),
                \DB::raw('avg(customer_service) as customer_service'),
                \DB::raw('avg(route) as route'),
                \DB::raw('avg(cost_benefit) as cost_benefit'),
                \DB::raw('avg(score) as score'),
            ]);

            return \View::make('score.result', compact(
                'averages',
                'bus',
                'score'
            ));
        }

        App::error('404');
    }
} 