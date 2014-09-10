<?php

class Score extends \BaseModel
{
    protected $table = 'buses_scores';

    protected $fillable = [
        'bus_id',
        'score',
        'user_name',
        'email',
        'comfort',
        'punctuality',
        'customer_service',
        'route',
        'cost_benefit'
    ];

    public static $rules = [
        'user_name' => 'required|min:5',
        'email' => 'required|email',
        'bus_id' => 'required|integer|exists:buses,id',
        'comfort' => 'required|in:0,3.3,6.6,10',
        'punctuality' => 'required|in:0,3.3,6.6,10',
        'customer_service' => 'required|in:0,3.3,6.6,10',
        'route' => 'required|in:0,3.3,6.6,10',
        'cost_benefit' => 'required|in:0,3.3,6.6,10'
    ];

    // RELATIONSHIPS

    public function bus()
    {
        return $this->belongsTo('Bus', 'bus_id');
    }

}