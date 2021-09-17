@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reviews</h1>
    </div>
    <div class="row">
        <div class="card  mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">

                    <div>
                        <a href="{{ route('review.create') }}" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">review name</th>
                        <th scope="col">reviewees</th>
                        <th scope="col">reviewers</th>
                        <th scope="col">feedback</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                     <tbody>
                    @foreach ($users as $viwers)
{{--                        $viwers = UsersReview::where('reviewee_id',$item->reviewee_id)->get())--}}
                        <tr>
                            <th scope="row">{{ $viwers->id }}</th>
                            <td>{{ $viwers->reviews->review_name}}</td>
                            <td>{{ $viwers->reviewees->username}}</td>
                            <td>
                            @foreach(\App\Models\UsersReview::where('reviewee_id' , $viwers->reviewee_id)->get() as $reviewers )
                                {{ $reviewers->reviewers->username}} -
                            @endforeach
                            </td>
                            <td>{{ $viwers->feedback}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Add Feedback
                                </button>
                                <a href="{{ route('review.edit', $viwers->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('Performance.addfeed')
@endsection


