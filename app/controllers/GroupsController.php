<?php

class GroupsController extends BaseController {

	public function index()
	{
		// Show a listing of groups
		$groups = Group::all();
		$title = "Groups";
		$buttons = [
			'create' => [
				'action' => 'GroupsController@create',
				'classes' => 'operations btn-success',
				'label' => 'Add Group'
			]
		];

		return View::make('groups.index', compact('groups', 'title', 'buttons'));
	}

	public function create()
	{
		// Show a create group form
		$title = "Add Group";
		$buttons = [ 
			'create' => [ 
				'action' => 'GroupsController@handleCreate', 
				'classes' => 'operations btn-primary submit', 
				'label' => 'Create' 
			],
			'cancel' => [
				'action' => 'GroupsController@index', 
				'classes' => 'operations btn-link', 
				'label' => 'Cancel' 
			]  
		];
		return View::make('groups.create', compact('title', 'buttons'));
	}

	public function handleCreate()
	{
		// Handle create form submission
		$group = new Group;
		$group->name = Input::get('name');
		$group->save();

		return Redirect::action('GroupsController@index');
	}

	public function edit(Group $group) 
	{
		// Show the edit group form.
		$title = "Edit Group";
		$buttons = [ 
			'edit' => [ 
				'action' => 'GroupsController@handleEdit', 
				'classes' => 'operations btn-primary submit', 
				'label' => 'Save' 
			],
			'cancel' => [
				'action' => 'GroupsController@index', 
				'classes' => 'operations btn-link', 
				'label' => 'Cancel' 
			] 
		];
		$people = Person::all();
		return View::make('groups.edit', compact('group', 'title', 'buttons', 'people'));
	}

	public function handleEdit()
	{
		$group = Group::findOrFail(Input::get('id'));
		$group->name = Input::get('name');
		$group->save();

		return Redirect::action('GroupsController@index');
	}
}