@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage academic year</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('closureDates.store') }}" method="post">
                        @csrf

                        <div class="col-md-4 "><label for=""> <strong>Idea Closure Date</strong></label>
                            <input type="date" class="form-control  @error('idea_closuredate') is-invalid @enderror"
                                value=" {{ old('idea_closuredate') }}" name="idea_closuredate">
                            @error('idea_closuredate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3"><label for=""> <strong>Comment Closure Date</strong></label>
                            <input type="date" class="form-control  @error('comment_closuredate') is-invalid @enderror"
                                value=" {{ old('comment_closuredate') }}" name="comment_closuredate">
                            @error('comment_closuredate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4 mt-3">
                            <label for=""> <strong>Academic Year</strong></label>
                            <select  name="academic_Year" class="form-control @error('academic_year') is-invalid @enderror" id="exampleFormControlSelect1">
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                            <option value="2026-2027">2026-2027</option>
                            </select>
                            @error('academic_Year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" col-md- 4 mt-5">
                            <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
