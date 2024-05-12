@extends('Frontend.master')
@section('content')
<section class="section-1">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
        data-bs-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <img src="images/carousel-1.jpg" class="d-block w-100" alt=""> -->

                <picture>
                    <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-1-m.jpg') }}" />
                    <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-1.jpg') }}" />
                    <img src="{{ asset('front-assets/images/carousel-1.jpg') }}" alt="" />
                </picture>

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Unleash Your Voice, Share Your Story.</h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo
                            stet amet amet ndiam elitr ipsum diam</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <picture>
                    <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-2-m.jpg') }}" />
                    <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-2.jpg') }}" />
                    <img src="{{ asset('front-assets/images/carousel-2.jpg') }}" alt="" />
                </picture>

                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Where Ideas Meet Expression.</h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo
                            stet amet amet ndiam elitr ipsum diam</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <!-- <img src="images/carousel-3.jpg" class="d-block w-100" alt=""> -->
                <picture>
                    <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-3-m.jpg') }}" />
                    <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-3.jpg') }}" />
                    <img src="{{ asset('front-assets/images/carousel-3.jpg') }}" alt="" />
                </picture>


                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3">
                        <h1 class="display-4 text-white mb-3">Shaping Conversations, Creating Connections.
                        </h1>
                        <p class="mx-md-5 px-5">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo
                            stet amet amet ndiam elitr ipsum diam</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<section class="section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <i class="fa icon fa-regular fa-pen-to-square text-primary m-0 mr-3"></i>
                    <h2 class="font-weight-semi-bold m-0">Create Posts</h5>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="box shadow-lg">
                    {{-- <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div> --}}
                    <i class=" fa icon fa-solid fa-calendar-days text-primary m-0 mr-3"></i>
                    <h2 class="font-weight-semi-bold m-0">Date-wise Filtering</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box shadow-lg">
                    <i class="fa icon fa-solid fa-users text-primary m-0 mr-3"></i>
                    <h2 class="font-weight-semi-bold m-0">User Profiles</h2>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="box shadow-lg">
                    <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                    <h2 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <form class="d-flex w-75 mx-auto ">
        <input class="form-control me-2 py-3 rounded-pill" value="{{ Request::get('keyword') }}" name="keyword"
            type="search" placeholder="Type to search..." aria-label="Search">
        <button class="btn btn-outline-success px-3 rounded-pill" type="submit">Search</button>
    </form>
</div>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Featured Post</h2>
        </div>
        <div class="row pb-3">
            @if ($posts->isNotEmpty())
            @foreach ($posts as $key => $post)
            <div class="col-md-3">
                <div class="card product-card">
                    <div class="product-image position-relative">
                        <a href="" class="product-img">
                            @if ($post->image)
                            <img class="avatar p-1" src="{{ asset($post->image) }}" alt="" style="height: 300px;">
                            @else
                            <img class="avatar p-1" src="{{ asset('front-assets/images/default-150x150.png') }}" alt=""
                                style="height: 300px;">
                            @endif
                        </a>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="price mt-2">
                            @if ($post->user)
                            <span class="h6 text-muted"><strong>Author:</strong> {{ $post->user->name }}</span><br>
                            @endif
                            <span class="h6 text-muted"><strong>Date:</strong> {{ $post->created_at->format('M d, Y')
                                }}</span><br>
                            <span class="h5"><strong></strong>{{ $post->create_at }}</span><br>
                            <span class="h5"><strong></strong>{{ $post->title }}</span><br>
                            <div class="price mt-2">
                                <span class="h6 text-underline">{{ $post->short_description }}</></span>
                            </div>
                        </div>
                        <a href="{{ route('home.singlePost', $post->id) }}" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div class="alert alert-danger">No Featured Posts found.</div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="section-4 pt-5">
    <div class="container">
        <div class="section-title">
            <h2>Latest Post</h2>
        </div>
        <div class="row pb-3">
            @if ($latestPosts->isNotEmpty())
            @foreach ($latestPosts as $key => $post)
            <div class="col-md-3">
                <div class="card product-card">
                    <div class="product-image position-relative">
                        <a href="" class="product-img">
                            @if ($post->image)
                            <img class="avatar p-1" src="{{ asset($post->image) }}" alt="" style="height: 300px;">
                            @else
                            <img class="avatar p-1" src="{{ asset('front-assets/images/default-150x150.png') }}" alt=""
                                style="height: 300px;">
                            @endif
                        </a>
                    </div>
                    <div class="card-body text-center mt-3">
                        @if ($post->user)
                        <span class="h6 text-muted"><strong>Author:</strong> {{ $post->user->name }}</span><br>
                        @endif
                        <span class="h6 text-muted"><strong>Date:</strong> {{ $post->created_at->format('M d, Y')
                            }}</span><br>
                        <span class="h6 link" href="product.php">{{ $post->title }}</span>
                        <div class="price mt-2">
                            <span class="h6 text-underline">{{ $post->short_description }}</></span>
                        </div>
                        <a href="" class="btn btn-primary mt-3">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div class="alert alert-danger">No Latests Posts found.</div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection