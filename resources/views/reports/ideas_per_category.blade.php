@extends('layouts.app')
@section('content')
<h2 class="text-center">Number of Ideas per Category</h2>

<div class="table-responsive mt-3">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Category</th>
                <th>Number of Ideas</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            @foreach($ideas_per_category as $ideas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ideas->categoryName }}</td>
                <td>{{ $ideas->categoryDescriptions }}</td>
                <td>{{ $ideas->ideas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection