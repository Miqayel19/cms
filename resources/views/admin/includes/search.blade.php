@foreach($students as $student)
    <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->surname}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->faculty->name}}</td>
        <td>{{$student->group->name}}</td>
    </tr>
@endforeach

