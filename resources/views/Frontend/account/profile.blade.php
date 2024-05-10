@extends('Frontend.master')
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                <li class="breadcrumb-item">My Profile</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-11 ">
    <div class="container  mt-5">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                @include('Frontend.account.common.sidebar')
            </div>
            <div class="col-md-9">
                <div class="shadow p-4 d-flex justify-content-between align-items-center">
                    <h4 class="text-uppercase">User Information</h4>
                </div>
                <section class="py-5 mt-5 my-auto" style="background-color: #f4f5f7;">
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-lg-6 mb-4 mb-lg-0 p-3">
                                <div class="card mb-3 gap-3 p-2" style="border-radius: .5rem;">
                                    <div class="row g-0">

                                        @if ($user)
                                        <div class="col-md-4 gradient-custom text-center text-black">
                                            <img src=" " alt="Avatar" class="img-fluid my-5 mx-auto rounded-circle"
                                                style="width: 150px; height: 150px; object-fit: cover;" />
                                        </div>
                                        <div class="col-12">
                                            <div class="card-body p-4">
                                                <h6>Information</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="mb-4">
                                                    <h6 class="mb-2">Name</h6>
                                                    <p class="text-muted">{{ $user->name }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <h6 class="mb-2">Email</h6>
                                                        <p class="text-muted">{{ $user->email }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h6 class="mb-2">Phone</h6>
                                                        <p class="text-muted">{{ $user->phone }}</p>
                                                    </div>
                                                </div>
                                                <!-- Additional fields as needed -->
                                                <div class="d-flex justify-content-center">
                                                    <a href="#!" style="margin-right: 15px"><i
                                                            class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                    <a href="#!" style="margin-right: 15px"><i
                                                            class="fab fa-twitter fa-lg me-3"></i></a>
                                                    <a href="#!" style="margin-right: 15px"><i
                                                            class="fab fa-instagram fa-lg"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection