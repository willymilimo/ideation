@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Academic Year</h6>
            </div>
            <div class="card-body">

                <div class="col-md-4 "><label for=""> <strong>Idea Closure Date</strong></label>
                    <input type="date" class="form-control  disabled" disabled value=" {{ $closureDate->idea_closuredate }}" name="idea_closuredate">
                </div>

                <div class="col-md-4 mt-3"><label for=""> <strong>Comment Closure Date</strong></label>
                    <input disabled type="date" class="form-control disabled" value=" {{ $closureDate->comment_closuredate }}" name="comment_closuredate">
                </div>

                <div class="col-md-4 mt-3">
                    <label for=""> <strong>Academic Year</strong></label>
                    <input disabled type="date" class="form-control  disabled" value=" {{ $closureDate->academic_Year }}" name="academic_Year">
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-2"></div>
</div>
@endsection