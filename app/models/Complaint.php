<?php

class Complaint extends \BaseModel {
	
    /*
     *  Fillable fields
     */
    protected $fillable = [
        'name',
        'email',
        'bus_id',
        'reason_id',
        'story',
        'reported'   
    ];

    public static $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email',
        'bus_id' => 'required|integer|exists:buses,id',
        'reason_id' => 'required|integer|exists:reasons,id',
        'story' => 'required'
    ];

    public static function leaderboard( $limit = null)
    {
        return static::groupBy('bus_id')
                        ->orderBy(DB::raw('COUNT(id)'), 'DESC')
                        ->take($limit)
                        ->get(['bus_id', DB::raw('COUNT(id) AS count')]);
    }

    public static function latest($limit)
    {
        return static::orderBy('created_at', 'DESC')->take($limit)->get();
    }

    public static function perReason( $limit = null)
    {
        return static::groupBy('reason_id')
                        ->orderBy(DB::raw('COUNT(id)'), 'DESC')
                        ->take($limit)
                        ->get(['reason_id', DB::raw('COUNT(id) AS count')]);
    }

    public function bus()
    {
        return $this->belongsTo('Bus');
    }

    public function reason()
    {
        return $this->belongsTo('Reason');
    }
}