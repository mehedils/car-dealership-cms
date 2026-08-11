<section class="section-box box-news background-body">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-9 mb-30 wow fadeInUp">
                <h3 class="title-svg neutral-1000 mb-15">{{ setting('home_blog_title', 'Latest News & Articles') }}</h3>
                <p class="text-lg-medium text-bold neutral-500">{{ setting('home_blog_subtitle', 'Stay updated with our latest stories and automotive insights') }}</p>
            </div>
            <div class="col-md-3 position-relative mb-30 wow fadeInUp text-end">
                <a href="{{ url('/blog') }}" class="btn btn-brand-2">{{ setting('home_blog_button_text', 'View All Posts') }}</a>
            </div>
        </div>
        <div class="box-list-news wow fadeInUp mt-5">
            <div class="row">
                @foreach($blogPosts as $post)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="card-news background-card hover-up">
                            <div class="card-image">
                                <a href="{{ url('/blog') }}">
                                    @if($post->image)
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" style="height: 220px; object-fit: cover; width: 100%;">
                                    @else
                                        <img src="{{ asset('assets/imgs/blog/blog-1/img-1.png') }}" alt="{{ $post->title }}" style="height: 220px; object-fit: cover; width: 100%;">
                                    @endif
                                </a>
                            </div>
                            <div class="card-info p-4">
                                <div class="card-meta">
                                    <span class="post-date neutral-500">{{ $post->published_at ? $post->published_at->format('d M Y') : now()->format('d M Y') }}</span>
                                </div>
                                <div class="card-title my-2">
                                    <a class="text-xl-bold neutral-1000" href="{{ url('/blog') }}">{{ $post->title }}</a>
                                </div>
                                <p class="text-sm neutral-500 mb-3">{{ Str::limit($post->excerpt, 90) }}</p>
                                <div class="card-program">
                                    <div class="endtime d-flex justify-content-between align-items-center">
                                        <div class="card-author d-flex align-items-center">
                                            <span class="text-sm-bold neutral-1000">By {{ $post->author_name ?? 'Admin' }}</span>
                                        </div>
                                        <div class="card-button">
                                            <a class="btn btn-gray" href="{{ url('/blog') }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
