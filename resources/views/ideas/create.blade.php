@extends('layouts.app')
@section('content')
 <div class="col-sm-12">

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

         @if (session()->get('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Submit an Idea') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('ideas.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="idealDetails"
                                    class="col-md-4 col-form-label text-md-end">{{ __('idea Details') }}</label>

                                <div class="col-md-6">
                                    <textarea id="idea_details" type="text" class="form-control @error('idea_details') is-invalid @enderror"
                                        name="idea_details" value="{{ old('idea_details') }}" required
                                        autocomplete="ideaDetails" autofocus></textarea>

                                    @error('idealDetails')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="department"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <select name="department_id" id=""
                                        class="form-control @error('department_id') is-invalid @enderror" required>
                                        @foreach ($departments as $dept)
                                            <option value="{{ $dept->id }}">{{ $dept->departmentName }}</option>
                                        @endforeach
                                    </select>


                                    @error('dept')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ideaCategory"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Idea Category') }}</label>

                                <div class="col-md-6">

                                    <select name="ideaCategory_id" id=""
                                        class="form-control @error('ideaCategory_id') is-invalid @enderror" required>
                                        @foreach ($idea_category as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                        @endforeach
                                    </select>


                                    @error('ideaCategory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="DocumentAtachment"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Document Attachment') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file"
                                        class="form-control @error('file') is-invalid @enderror"
                                        name="file" value="{{ old('file') }}"
                                        autocomplete="DocumentAttachment">

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input  @error('anonymous_id') is-invalid @enderror"
                                            type="radio" name="anonymous_id" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Anonymous</label>
                                        @error('anonymous_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input  @error('anonymous_id') is-invalid @enderror"
                                            type="radio" name="anonymous_id" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Not Anonymous</label>

                                        @error('anonymous_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-check">
                                    <input
                                        class="form-check-input position-static @error('terms_condition') is-invalid @enderror"
                                        type="checkbox" id="blankCheckbox" value="option1" name="terms_condition"
                                        aria-label="..."> <span>I Accept the <a href="#">terms of use
                                            Privacy policy </a> and <a href="#"> Disclaimer</a> </span>
                                    @error('terms_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
