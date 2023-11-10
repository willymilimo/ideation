@extends('layouts.app')
@section('content')
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">QA Coordinator</th>
                    <th scope="col">Idea Closure Date</th>
                    <th scope="col">Comment Closure Date</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <?php $no=1 ?>
            @foreach($departments as $dpt)
                <tr>
                    <th scope="row">{{$no++ }}</th>
                    <td>{{ $dpt->departmentName}}</td>
                    <td>{{ $dpt->qaCoodinatorID}}</td>
                    <td>{{ $dpt->closuredate}}</td>
                    <td>{{ $dpt->comentClosuredate}}</td>
                    <td>{{ $dpt->created_at}}</td>
                </tr>
            @endforeach
    
            </tbody>
        </table>
    </div>
@endsection
