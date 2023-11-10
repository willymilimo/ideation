@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add a Category</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <label for=""> <strong>Category Name</strong></label>
                        <input type="text" class="form-control  @error('categoryName') is-invalid @enderror"
                            value=" {{ old('categoryName') }}" name="categoryName">
                        @error('categoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                         <label for="" class="pt-3"> <strong> Category Descriptions</strong></label>
                        <input type="text" class="form-control  @error('categoryDescriptions') is-invalid @enderror"
                            value=" {{ old('categoryDescriptions') }}" name="categoryDescriptions">
                        @error('categoryDescriptions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <div class="submitbtn pt-3">
                                <a href="{{ route('categories.index') }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
