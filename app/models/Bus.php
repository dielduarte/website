<?php

class Bus extends \Eloquent {
	protected $fillable = ['line', 'itinerary'];

    public function complaints()
    {
        return $this->hasMany('Complaint', 'bus_id');
    }
}