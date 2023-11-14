@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
                @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{ $role->roleName }}</td>
                    <td>{{ $role->createdAt }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td><a href="{{ route('roles.edit', $role->id) }}"><span><i class="fas fa-fw fa-edit"></i></span> </a></td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
@endsection
