<?php

class BaseModel extends \Eloquent {
    /*
     *  Validates an model input.
     *  @param $data
     */
	public static function validate($data)
    {
        return Validator::make($data, static::$rules);
    }
}