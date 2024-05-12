@extends('Frontend.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Post Details</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset($posts->image) }}" alt="Post Image" class="img-fluid mb-4"
                        style="max-width: 100%; height: auto;">
                    <p><strong>Author : </strong>{{ $user->name }}</p>
                    <p><strong>Date Posted : </strong> {{ $posts->created_at->format('M d, Y') }}</p>
                    <h4 class="card-title">{{ $posts->title }}</h4>
                    <p class="card-text">{{ $posts->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection