@extends('frontend.layouts.main')


@section('main-container')
<main class="main">
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Team</h1>
            <nav class="breadcrumbs">
                <ol>
                  <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Team</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="team" class="team section">
        <div class="container">
            <div class="row gy-4">
                @foreach($teams as $team)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{ $team->name }}</h4>
                                <span>{{ $team->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
