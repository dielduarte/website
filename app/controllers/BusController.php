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
}