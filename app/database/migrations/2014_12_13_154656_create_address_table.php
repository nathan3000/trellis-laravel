<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function($table)
	    {
	        $table->increments('id');
	        $table->string('mailing_address');
	        $table->string('mailing_address2');
	        $table->string('mailing_city');
	        $table->string('mailing_county');
	        $table->string('mailing_postcode');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
