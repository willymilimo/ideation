@extends('layouts.app')
@section('content')
<h2 class="text-center">Number of ideas per Department</h2>
<table class=" mt-3 table table-success">
    <thead>
        <tr>
            <th>No.#</th>
            <th>Department</th>
            <th>Department Number</th>
            <th>Number of Ideas</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach($ideas_per_dept as $ideas)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ideas->departmentName }}</td>
            <td>{{ $ideas->departmentID }}</td>
            <td>{{ $ideas->Number_of_ideas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection