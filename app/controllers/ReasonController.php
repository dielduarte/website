<?php

class ReasonController extends BaseController
{
    public function lists($slug)
    {
        $reason = Reason::whereSlug($slug)->first();
        if ($reason) {
            $complaints = Complaint::whereReasonId($reason->id)->orderBy('created_at', 'DESC')->paginate(30);
            return View::make('reasons.list-per-type', compact('reason', 'complaints'));
        } else {
            App::abort('404');
        }
    }
}