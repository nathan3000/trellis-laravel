<?php

class Person extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'people';
		
	public function address()
    {
        return $this->belongsTo('Address', 'mailing_address_id');
    }	

    public function groups()
    {
    	return $this->belongsToMany('Group');
    }

}