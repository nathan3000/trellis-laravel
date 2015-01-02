<?php

class PeopleController extends BaseController {
	
	public function index()
	{
		// Show a listing of people.
		$people = Person::all();
		$title = "People";
		$buttons = [ 
			'create' => [ 
				'action' => 'PeopleController@create', 
				'classes' => 'operations btn-success', 
				'label' => 'Add Person' 
			] 
		];

		return View::make('people.index', compact('people', 'title', 'buttons'));
	}

	public function create()
	{
		// Show the create person form.
		$title = "Add Person";
		$buttons = [ 
			'create' => [ 
				'action' => 'PeopleController@handleCreate', 
				'classes' => 'operations btn-primary submit', 
				'label' => 'Create' 
			],
			'cancel' => [
				'action' => 'PeopleController@index', 
				'classes' => 'operations btn-link', 
				'label' => 'Cancel' 
			]  
		];
		return View::make('people.create', compact('title', 'buttons'));
	}

	public function handleCreate()
	{
		// Handle create form submission.
		$person = new Person;
		$person->firstname = Input::get('firstname');
		$person->lastname = Input::get('lastname');
		$person->email = Input::get('email');
		$person->phone = Input::get('phone');
		$person->mobile = Input::get('mobile');
		
		$address = new Address;
		$address->mailing_address = Input::get('address');
		$address->mailing_county = Input::get('county');
		$address->mailing_city = Input::get('city');
		$address->mailing_postcode = Input::get('postcode');
		$address->save();
		
		$person->address()->associate($address);
		$person->save();
		
		return Redirect::action('PeopleController@index');
	}

	public function edit(Person $person) 
	{
		// Show the edit game form.
		$title = "Edit Person";
		$buttons = [ 
			'edit' => [ 
				'action' => 'PeopleController@handleEdit', 
				'classes' => 'operations btn-primary submit', 
				'label' => 'Save' 
			],
			'cancel' => [
				'action' => 'PeopleController@index', 
				'classes' => 'operations btn-link', 
				'label' => 'Cancel' 
			] 
		];
		return View::make('people.edit', compact('person', 'title', 'buttons'));
	}

	public function handleEdit()
	{
		// Handle edit form submission.
		$person = Person::findOrFail(Input::get('id'));
		$person->firstname = Input::get('firstname');
		$person->lastname = Input::get('lastname');
		$person->email = Input::get('email');
		$person->phone = Input::get('phone');
		$person->mobile = Input::get('mobile');
		$person->save();

		$address = Address::findOrFail($person->mailing_address_id);
		$address->mailing_address = Input::get('address');
		$address->mailing_county = Input::get('county');
		$address->mailing_city = Input::get('city');
		$address->mailing_postcode = Input::get('postcode');
		$address->save();
		
		return Redirect::action('PeopleController@index');
	}

	public function delete(Person $person)
	{
		// Show delete confirmation page.
		$title = "Delete " . $person->firstname ." <small>Are you sure?</small>";
		return View::make('people.delete', compact('person', 'title'));
	}

	public function handleDelete()
	{
		// Handle the delete confirmation.
		$id = Input::get('person');
		$person = Person::findOrFail($id);
		$person->delete();

		return Redirect::action('PeopleController@index');
	}

	public function search()
	{
		$searchTerms = explode(' ', Input::get('query'));

		$columns = [
			'firstname', 
			'lastname', 
			'email', 
			'phone', 
			'mobile', 
			'gender',
			'mailing_address',
			'mailing_address2',
			'mailing_city',
			'mailing_county',
			'mailing_postcode'
		];

		$query = Person::join('addresses', 'people.mailing_address_id', '=', 'addresses.id');

		foreach ($searchTerms as $term) {			

			foreach ($columns as $column_name) {
				$query = $query->orWhere($column_name, 'LIKE', '%'.$term.'%');
			}
		}

		$people = $query->get();

		$title = "People";
		
		return View::make('people.index', compact('people', 'title'));
	}

	public function findPerson()
	{
		$term = Input::get('people');
		$query = Person::where('firstname', 'LIKE', '%'.$term.'%')
							->orWhere('lastname', 'LIKE', '%'.$term.'%');

		$people = $query->get();

		return Response::json($people);
	}
}