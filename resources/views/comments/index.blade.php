@extends('layouts.app')
@section('content')
    <div class="container mt-4 mb-5">

        <div class="d-flex justify-content-center row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Most Popular Ideas <span
                                class="badge bg-primary ml-2 text-color-sidebar text-white">2</span>
                        </li>
                        <li class="list-group-item">Most Viewed Idea <span
                                class="badge bg-primary ml-2 text-color-sidebar text-white">10</span></li>
                        <li class="list-group-item">Latest Idea <span
                                class="badge bg-primary ml-2 text-color-sidebar text-white">15</span></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-8">
                <div class="feed p-2">
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white border">
                        <div class="feed-text px-2">
                            <h6 class="text-black-50 mt-2"> Comment Section</h6>
                        </div>
                        <div class="feed-icon px-2"><i class="fa fa-long-arrow-up text-black-50"></i></div>
                    </div>
                    <form action="{{ route('commentStore') }}" method="POST">
                        @csrf
                        @foreach ($idea_list as $idea)
                            <div class="bg-white border mt-2">
                                <div>
                                    <div
                                        class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                        <div class="d-flex flex-row align-items-center feed-text px-2">
                                            {{-- <img class="rounded-circle"
                                        src="href=//imgur.com/a/WtjqS9qg" width="45"> --}}
                                            <div class="d-flex flex-column flex-wrap ml-2">
                                                <span class="font-weight-bold"><span>Title: </span> {{ $idea->title }}
                                                
                                                </span>

                                                <span class="text-black-50 time"><span
                                                        class="fst-normal font-weight-bold">posted by:
                                                    </span>{{ $idea->name }}
                                                </span>
                                                <span class="text-black-50 time"><span
                                                        class="fst-normal font-weight-bold">posted at:
                                                    </span>{{ $idea->createdDate }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                                    </div>
                                </div>
                                <div class="p-2 px-3"><span class="font-weight-bold"> Details</span></div>
                                <div class="p-2 px-3"><span>{{ $idea->IdealDetails }}</span></div>
                                <div class="p2 mt-3 px-3">
                                    <ul class="list-group">
                                        <li class="list-group-item active">Comments</li>
                                        @foreach($comments as $comment)
                                        <li class="list-group-item">
                                            <h5>{{ $comment->name }}</h5> 
                                            <p>{{ $comment->commentDetails }}</p> 
                                            <span>{{ $comment->createdDate }}</span>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="p-2 px-3">
                                    <div class="form-floating">

                                        <textarea class="form-control" name="commentDetails" placeholder="Leave a comment here" id="floatingTextarea2"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                            <input type="hidden" name="ideaID" value="{{ $idea->ideasID }}">

                                    </div>

                                </div>
                                <div class="p2 px-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anon2"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Non Anonymous</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="anon1"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Anonymous</label>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end socials p-2 py-3">
                                    <button type="submit" class=" mr-5 btn btn-success">Success</button>
                                </div>
                            </div>
                        @endforeach
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
