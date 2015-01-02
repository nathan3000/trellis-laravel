        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="name">Group name</label>
                    <input type="text" class="form-control" name="name" value="{{ $group->name or "" }}" />
                </div>
                <div class="form-group">
                    <label for="name">People</label>
                    <input id="people-search" type="text" class="form-control typeahead" name="people" placeholder="Add person to group.." value="{{ $group->people or "" }}" />
                	
                    @if ($people->isEmpty())
				        <p>There are no people! :(</p>
				    @else

                	<ul class="people-list">
	                	@foreach($people as $person)
		                <li>{{ $person->firstname }}</li>
		                @endforeach
	                </ul>

	                @endif
                </div>
            </div>
        </div>