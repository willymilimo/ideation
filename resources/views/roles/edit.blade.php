@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @method('PATCH')
                        @csrf

                        <label for=""><strong>Role Name</strong> </label>
                        <input type="text" class="form-control" name="roleName" value="{{ $role->roleName }}">

                        <div class="form-group pt-4 ">

                            <a href="{{ route('roles.index') }}"><button type="submit"
                                    class="btn btn-danger">Cancel</button></a>
                            <button type="submit" class="btn btn-success pull-right" style="float:right">Update</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
