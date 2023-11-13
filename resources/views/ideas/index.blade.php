@extends('layouts.app')
@section('scripts')
<link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
@endsection
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
<div class="container mt-4 mb-5">

    <div class="d-flex justify-content-center row">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Most Popular Ideas <span class="badge bg-primary ml-2 text-color-sidebar">2</span>
                    </li>
                    <li class="list-group-item">Most Viewed Idea <span class="badge bg-primary ml-2 text-color-sidebar">10</span></li>
                    <li class="list-group-item">Latest Idea <span class="badge bg-primary ml-2 text-color-sidebar">15</span></li>
                </ul>
            </div>

        </div>
        <div class="col-md-8">
            <div class="feed p-2">
                <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
                    <div class="feed-text px-2">
                        <h6 class="text-black-50 mt-2">Ideas</h6>
                    </div>
                    <div class="feed-icon px-2"><i class="fa fa-long-arrow-up text-black-50"></i></div>
                </div>
                @foreach ($ideas as $idea)
                <div class="bg-white border mt-2">
                    <div>
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2">
                                {{-- <img class="rounded-circle"
                                        src="href=//imgur.com/a/WtjqS9qg" width="45"> --}}
                                <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">{{ $idea->name }}
                                    </span><span class="text-black-50 time">{{ $idea->createdDate }}</span></div>
                            </div>
                            <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                        </div>
                    </div>
                    <div class="p-2 px-3">
                        <span>{{ $idea->IdealDetails }}</span>
                    </div>

                    <div class="d-flex justify-content-end socials p-2 py-3">
                        <a class="ml-1" href="{{ route('thumbsUp', $idea->ideasID) }}">
                            {{ $idea->thumbUps }}
                            <i class="ml-1 fa fa-thumbs-up"></i>
                        </a>

                        <a href="{{ route('thumbsDown', $idea->ideasID) }}">
                            {{ $idea->thumbsDown }}<i class="ml-1 fa fa-thumbs-down"></i>
                        </a>
                        <a href="{{ route('comments', $idea->ideasID) }}">
                            <i class="fa fa-comments"></i>
                        </a>
                        <i class="fa fa-share"></i>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <Span class="pull-left p-5">{{ $ideas->links() }}</Span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection