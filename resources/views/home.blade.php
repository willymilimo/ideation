@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="far fa-lightbulb"></i> | Ideas</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="col-md-12">
                        <div class="feed p-2">
                            @foreach ($ideas as $idea)
                            <div class="bg-white border mt-2">
                                <div class="bg-gradient-light">
                                    <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                        <div class="d-flex flex-row align-items-center feed-text px-2">
                                            <div class="d-flex flex-column flex-wrap ml-2">
                                                <div><i class="fas fa-user-astronaut mr-2"></i></i><span class="font-weight-bold text-gray-800">{{ $idea->name }}</span></div>
                                                <div><i class="far fa-clock mr-2"></i><span class="text-black-50 time text-gray-800">{{ $idea->createdDate }}</span></div>
                                            </div>
                                        </div>
                                        <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                                    </div>
                                </div>
                                <div class="p-2 px-3">
                                    <span>{{ $idea->IdealDetails }}</span>
                                </div>

                                <div class="d-flex justify-content-end socials p-2 py-3">
                                    <a class="mr-3 text-success" href="{{ route('thumbsUp', $idea->ideasID) }}">
                                        {{ $idea->thumbUps }}
                                        <i class="ml-1 fa fa-thumbs-up text-success"></i>
                                    </a>
                                    <a href="{{ route('thumbsDown', $idea->ideasID) }}" class="text-danger mr-3">
                                        {{ $idea->thumbsDown }}<i class="ml-1 fa fa-thumbs-down text-danger"></i>
                                    </a>
                                    <a href="{{ route('comments', $idea->ideasID) }}" class="text-dark">
                                        <i class="fa fa-comments"></i>
                                    </a>
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
        </div>
    </div>
</div>
@endsection