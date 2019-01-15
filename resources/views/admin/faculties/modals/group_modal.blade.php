<option value="{{null}}">All</option>
@foreach($faculty_groups as $group)
    <option value="{{$group->id}}">{{$group->name}}</option>
@endforeach