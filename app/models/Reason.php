<?php

class Reason extends \Eloquent {

	protected $fillable = [];

    public function complaints()
    {
        return $this->hasMany('Complaint', 'reason_id');
    }

}