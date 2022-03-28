<div class="col-xl-2 col-md-6 mb-xl-0 mt-4 mb-5">
    <div class="card card-blog card-plain">
        <div class="position-relative">
            <a href="{{ route('movies.show', $movie['id']) }}" class="d-block shadow-xl border-radius-xl">
                <img src=" {{ 'https://image.tmdb.org/t/p/w300/' . $movie['poster_path'] }}" alt="img-blur-shadow"
                    class="img-fluid shadow border-radius-xl">
            </a>
        </div>
        <div class="card-body px-1 pb-0">
            <div class="h-100">
                <p class="mb-0 font-weight-bold text-sm">
                    {{ $movie['vote_average'] * 10 . '%' }} |
                    {{ \Carbon\Carbon::parse($movie['release_date'])->format('d M, Y') }}
                </p>
            </div>
            <a href="{{ route('movies.show', $movie['id']) }}">
                <h6> {{ $movie['original_title'] }}</h6>
            </a>
            {{-- <p class="text-gradient text-dark mb-2 text-sm">
                {{ Str::limit($movie['overview'], 130) }}
            </p>
            <div class="d-flex align-items-center justify-content-between">
                <article>
                    @foreach ($movie['genre_ids'] as $genre)
                        <span class="ms-1">{{ $genres->get($genre) }}
                            @if (!$loop->last)
                                ,
                            @endif
                        </span>
                    @endforeach
                </article>
            </div> --}}
        </div>
    </div>
</div>
