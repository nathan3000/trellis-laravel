<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupsPeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_person', function($table)
		{
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('people');

			$table->integer('group_id')->unsigned();
			$table->foreign('group_id')->references('id')->on('groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('groups_people');
	}

}
