@extends('layouts.app')
@section('content')
<h2 class="text-center">Number of ideas per Department</h2>

<div class="table-responsive mt-3">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Department</th>
                <th>Department Number</th>
                <th>Number of Ideas</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
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

</div>

@endsection