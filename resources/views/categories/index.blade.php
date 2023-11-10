@extends('layouts.app')

@section('content')
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            
                @foreach($categories as $category)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$category->id}}</td>
                    <td>{{ $category->categoryName }}</td>
                    <td>{{ $category->categoryDescriptions }}</td>
                    <td>{{ $category->createdAt }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td><a href="{{ route('categories.edit', $category->id) }}"><span><i class="fas fa-fw fa-edit"></i></span> </a></td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
@endsection
