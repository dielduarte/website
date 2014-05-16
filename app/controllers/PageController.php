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
	 *	Load the media page.
	 **/
	public function media()
	{
		return View::make('pages.media');
	}

	/**
	 *	Load the contacts page.
	 **/
	public function contact()
	{
		return View::make('pages.contact');
	}

	/**
	 *	Load the team page.
	 **/
	public function team()
	{
		return View::make('pages.team');
	}

}