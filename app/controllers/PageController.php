<?php

class PageController extends \BaseController {

	/*
	 *	Load the homepage of the application.
	 */
	public function home()
	{
		$complaints = Complaint::leaderboard(10);
		return View::make('pages.home', compact('complaints'));
	}

	/**
	 *	Load the statistics page.
	 **/
	public function statistics()
	{
		$complaints = Complaint::leaderboard();
		$reasons = Complaint::perReason(10);
    	return View::make('pages.statistics', compact('complaints', 'reasons'));
	}

	/**
	 *	Load the contacts page.
	 **/
	public function contact()
	{
		return View::make('pages.contact');
	}

}