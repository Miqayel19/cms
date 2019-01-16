@foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->surname}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->email}}</td>
        <td>
            @if($student->faculty)
                {{$student->faculty->name}}
            @endif
        </td>
        <td>
            @if($student->faculty)
                {{$student->group->name}}
            @endif
        </td>
    </tr>
@endforeach

