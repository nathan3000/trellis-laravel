<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressFkOnPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('people', function($table)
	    {
	    	$table->integer('mailing_address_id')->unsigned();
	    	$table->foreign('mailing_address_id')->references('id')->on('addresses')->onDelete('cascade');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
