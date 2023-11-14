@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add a Role</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <label for=""> <strong>Role Name</strong></label>
                    <input type="text" class="form-control  @error('roleName') is-invalid @enderror" value=" {{ old('roleName') }}" name="roleName">
                    @error('roleName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                    <div class="submitbtn pt-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endsection