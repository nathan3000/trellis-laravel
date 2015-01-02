<?php

class Address extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

	public $timestamps = false;

	public function person()
    {
        return $this->hasMany('Person');
    }
	

}