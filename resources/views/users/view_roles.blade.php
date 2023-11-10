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
                    <th scope="col">Role Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach ($data as $dt)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $dt->roleName }}</td>

                    <td>
                      
                    <a  class="btn btn-primary" href="{{ route('createRoles') }}">Add</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <!-- =====================modal========================== -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete user
                            {{ $dt->roleName }}?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <i class=" fa fa-times-circle fa-7x" style="padding-left:150px; color:red;" aria-hidden="true"></i>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="" method="post">
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
