<?php

class BusController extends \BaseController {

	/**
	 *	Load an bus specific page. It shows the complaints associated with the bus line.
	 *	@param 	$line 	The line of the bus.
	 *	@return Response
	 **/
	public function line($line)
	{
	    $bus = Bus::whereLine($line)->first();
	    if ( $bus ) {

            $complaints = $bus->complaints()->orderBy('created_at', 'DESC')->get();

	        return View::make('buses.view', compact('bus', 'complaints'));
	    }

        \App::abort(404);
	}

    public function addBusLine()
    {
        return \View::make('buses.add-line');
    }

    public function postNewLine()
    {

        $data = Input::all();

        $rules = [
            'line'      => 'required',
            'itinerary' => 'required',
            'name'      => 'required',
            'email'     => 'required|email',
            'recaptcha_response_field' => 'required|recaptcha'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::to('adicionar-linha')
                ->withInput()
                ->withErrors($validator);
        } else {

            $bus = new Bus;
            $bus->line = filter_var($data['line'], FILTER_SANITIZE_STRING);
            $bus->itinerary = filter_var($data['itinerary'], FILTER_SANITIZE_STRING);
            $bus->save();

            Mail::send('emails.add-new-line', $data, function ($message) {
                $message->to('luiz.pedone@gmail.com', 'Luiz Felipe Pedone')->subject('Adicionar linha no Não Move');
            });

            return Redirect::to('adicionar-linha')
                ->with('message', 'success');
        }
    }

}