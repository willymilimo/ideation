@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit a User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update',$users->id) }}" method="post">
                        @method('PATCH')
                        @csrf

                        <label for=""><strong>First Name</strong> </label>
                        <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $users->firstName}}">

                        <label for=""><strong>Last name</strong> </label>
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $users->lastName}}">

                        <label for=""><strong>Email</strong> </label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email}}">

                        <label for=""><strong> Role</strong> </label>
                        <select name="roleID" id="" class="form-control @error('roleID') is-invalid @enderror">
                        <option class="form-control ">--select role</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" name="roleID">{{$role->roleName}}</option>
                        @endforeach
                        </select>
                        @error('roleID')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group pt-4 ">
                            <a class="btn btn-danger" href="{{route('users.index')}}">Cancel</a>
                            
                            <button type="submit" class="btn btn-primary pull-right" style="float:right">Modify</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection