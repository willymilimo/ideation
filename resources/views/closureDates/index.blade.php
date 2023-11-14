@extends('layouts.app')

@section('content')
<div class="col-sm-12">
    @if (session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
<div class="col-sm-12">
    @if (session()->get('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Idea Closure Date</th>
                <th scope="col">Comment Closure Date</th>
                <th scope="col">Academic Year</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @foreach($closureDates as $closureDate)
        <tr>
            <td>{{$closureDate->id}}</td>
            <td>{{ $closureDate->idea_closuredate }}</td>
            <td>{{ $closureDate->comment_closuredate }}</td>
            <td>{{ $closureDate->academic_Year }}</td>
            <td>{{ $closureDate->created_at }}</td>
            <td>{{ $closureDate->updated_at }}</td>
            <td>
                <a href="{{ route('closureDates.edit', $closureDate->id) }}"><span><i class="fas fa-fw fa-edit"></i></span> </a>
                <form action="{{ route('closureDates.destroy', $closureDate->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection