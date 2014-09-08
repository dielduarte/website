<?php

class ComplaintController extends \BaseController {

	/**
	 * Load a specific complaint.
	 * @param $complaint_id
	 * @return Response
	 */
	public function view($complaint_id)
	{
		$complaint  = Complaint::findOrFail($complaint_id);
        $bus        = $complaint->bus;
        $count      = $complaint->bus->complaints()->count();
    	return View::make('complaints.view', compact(
            'complaint',
            'bus',
            'count'
        ));
	}

	/**
	 * Store a new complaint.
	 * @return Response
	 */
	public function store()
	{
		$validation = Complaint::validate(Input::except('_token'));
	    if($validation->fails())
	    {
	        return Redirect::to('/')->withErrors($validation)->withInput();
	    } 
	    else
	    {
	        $complaint = Complaint::create(Input::except('_token'));
	        return Redirect::to('reclamacao/' . $complaint->id )
	            ->with('message', 'O seu relato foi adicionado com sucesso! 
	                Compartilhe com seus amigos a sua história.')
	            ->with('messageType', 'success');  
	    }
	}

}