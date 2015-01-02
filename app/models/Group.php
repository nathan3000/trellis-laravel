<?php

class Group extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	public function person()
	{
		return $this->belongsToMany('Person');
	}

}