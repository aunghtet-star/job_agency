@extends('admin.layouts.master')

@section('title', 'Password Change Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-8 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Profile</h3>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-3 offset-2 pt-3">
                                    <div>
                                        @if (Auth::user()->image == null)
                                            <img src="{{ asset('admin/images/icon/avatar-01.jpg') }}" class="img-thumbnail shadow-sm"/>

                                        @else
                                            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-thumbnail shadow-sm">
                                        @endif
                                    </div>

                                    <div class="pt-4">
                                        <a href="{{ route('admin#edit') }}">
                                            <button class="btn btn-dark text-white">
                                                <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                Edit Profile
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-5 offset-1">
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-user-pen mr-2"></i> {{ Auth::user()->name }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-envelope mr-2"></i> {{ Auth::user()->email }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-phone mr-2"></i> {{ Auth::user()->phone }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-address-card mr-2"></i> {{ Auth::user()->address }}
                                    </h4>
                                    <h4 class="my-3">
                                        <i class="fa-solid fa-user-clock mr-2"></i> {{ Auth::user()->created_at->format('j-F-Y') }}
                                    </h4>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
@endsection
