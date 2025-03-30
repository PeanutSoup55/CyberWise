@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Welcome back!</h1>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card text-white bg-primary shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Continue Learning</h5>
                        <p class="card-text">Pick up where you left off in your current lesson.</p>
                        <a href="#" class="btn btn-light btn-sm">Resume</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-white bg-success shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Explore New Content</h5>
                        <p class="card-text">Check out new lessons and quizzes added recently.</p>
                        <a href="#" class="btn btn-light btn-sm">Browse</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4>Your Progress</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Course:</strong> Cyber Hygiene 101</li>
                <li class="list-group-item"><strong>Lesson:</strong> Passwords & Authentication</li>
                <li class="list-group-item"><strong>Status:</strong> In Progress</li>
            </ul>
        </div>

        <div class="mt-5">
            <h4>New Content</h4>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title">Intro to Social Engineering</h6>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Lesson</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title">Phishing Awareness</h6>
                            <a href="#" class="btn btn-sm btn-outline-primary">Start Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
