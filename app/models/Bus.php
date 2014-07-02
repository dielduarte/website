<?php

class Bus extends \Eloquent {

    protected $fillable = [
        'line',
        'itinerary',
        'name',
        'email'
    ];

    /*
     * Scopes
     */
    public function scopeActiveBusesList($query)
    {
        $query->remember(720, 'bus_lines')
              ->active()
              ->select(DB::raw('concat (line," (", itinerary, ")") as line_plus_itinerary, id'))
              ->orderBy('line_plus_itinerary', 'ASC');
    }

    public function scopeActive($query)
    {
        $query->where('active', '=', true);
    }

    /*
     * Relationships
     */
    public function complaints()
    {
        return $this->hasMany('Complaint', 'bus_id');
    }
}