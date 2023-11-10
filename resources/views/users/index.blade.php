@extends('layouts.app')
@section('content')
    <div class="col-sm-12">

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User Role</th>
                    <th scope="col">email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            {{ $no = 1 }}
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->roleName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->id }}</td>
                    <td>
                        <span>
                            <i class="fas fa-trash" data-target="#exampleModalCenter" data-toggle="modal"
                                style="color:red"></i>
                        </span>
                        <span class="fa-passwd-reset fa-stack ml-3" data-toggle="tooltip" title="Password Reset">
                            <a href="#" style="text-decoration: none;">
                                <i class="fa fa-undo fa-stack-2x" style="color:#1e4afc"></i>
                                <i class="fa fa-lock fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="ml-3">
                            <a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit" style="color:green"
                                    aria-hidden="true"></i></a>
                        </span>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <!-- =====================modal========================== -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="icon-box">
                                    <i class="material-icons">&#xE5CD;</i>
                                </div>
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete user {{ $user->name }}?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <i class=" fa fa-times-circle fa-7x" style="padding-left:150px; color:red;" aria-hidden="true"></i>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- =====================modal end ====================== -->
    </div>
@endsection
