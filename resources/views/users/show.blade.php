@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="dashboard">
            <p>{{ $user->getRoleName() }}</p>

            <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>

            <div class="dashboard-info">
                <div class="dashboard-info-block">
                    Total
                    <span class="dashboard-info-block__number">{{ $total_works }}</span>
                </div>

                <div class="dashboard-info-block">
                    Music
                    <span class="dashboard-info-block__number">{{ $music_works }}</span>
                </div>

                <div class="dashboard-info-block">
                    Painting
                    <span class="dashboard-info-block__number">{{ $painting_works }}</span>
                </div>

                <div class="dashboard-info-block">
                    Literature
                    <span class="dashboard-info-block__number">{{ $literature_works }}</span>
                </div>
            </div>

            @can('update', $user)
                <div class="dashboard-manage">
                    @can('create', \App\Models\Work::class)
                        <a href="/work/create" class="btn btn-primary">New Work</a>
                    @else
                        <button class="btn disabled">New Work</button>
                    @endcan

                    <a href="/edit-profile" class="btn btn-primary">Edit Profile</a>
                </div>
            @endcan
        </div>

        <h2>Works</h2>

        <div class="works-list">
            @forelse($works as $work)
                <div class="works-list__item">
                    <a href="/work/{{ $work->id }}">
                        <p>{{ $work->type }}</p>

                        <p>{{ $work->title }}</p>

                        <p>{{ $work->created_at }}</p>

                        @can('update', $user)
                            <a href="/work/{{ $work->id }}/edit" class="btn btn-secondary">Edit</a>
                        @endcan

                        @can('delete', $work)
                            <form action="/work/{{ $work->id }}/delete" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-secondary">Delete</button>
                            </form>
                        @endcan

                        <a href="" class="btn btn-secondary">More</a>
                    </a>
                </div>
            @empty
                There is no works...
            @endforelse

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $works->links() }}
                </div>
            </div>
        </div>

        @can('viewAny', \App\Models\Review::class)
            <h2>Reviews</h2>

            <div class="works-list">
                @forelse($user->reviews as $review)
                    <div class="works-list__item">
                        <a href="/work/{{ $review->work->id }}">
                            <p>{{ $review->work->type }}</p>

                            <p>{{ $review->work->title }}</p>

                            <p>{{ $review->work->created_at }}</p>
                        </a>
                    </div>
                @empty
                    There are no reviews...
                @endforelse


                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $works->links() }}
                    </div>
                </div>
            </div>
        @endcan
    </div>
</div>
@endsection
