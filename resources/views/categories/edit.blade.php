@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit a category</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @method('PATCH')
                        @csrf

                        <label for=""><strong>Category name</strong> </label>
                        <input type="text" class="form-control" name="categoryName" value="{{ $category->categoryName }}">

                        <label for=""><strong>Category description</strong> </label>
                        <input type="text" class="form-control" name="categoryDescriptions"
                            value="{{ $category->categoryDescriptions }}">

                        <div class="form-group pt-4 ">

                            <a href="{{ route('categories.index') }}"><button type="submit"
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
