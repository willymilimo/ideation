@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add a department</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.store') }}" method="post">
                        @csrf
                        <label for=""> <strong>Department Name</strong></label>
                        <input type="text" class="form-control  @error('departmentName') is-invalid @enderror"
                            value=" {{ old('departmentName') }}" name="departmentName">
                        @error('departmentName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for=""> <strong>QA Coodinator</strong></label>
                            <select class="form-control" name="qaCoodinatorID" id="sel1">
                                @foreach($qa_coordinators as $qa)
                                <option Value="{{ $qa->id }}" name="qaCoodinatorID">{{ $qa->name }}</option>
                                @endforeach
                            </select>
                            @error('qaCoodinatorID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <a href="{{ route('departments.index') }}" class="btn btn-warning">back</a>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
