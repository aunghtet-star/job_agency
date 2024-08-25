@extends('partial.user')

@section('title', 'post Page')

@section('content')

@if (session('success'))
<div class="row">
    <div class="col-4 offset-8">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-xmark"></i>
            {{ session('success') }}
        </div>
    </div>
</div>
@endif


<div class="container-fluid pb-5">

    <div class="row px-xl-5">
        <div class="col-12 col-lg-3 offset-lg-9 mb-4">
            <form action="{{ route('home') }}" method="GET">
                @csrf
                <div class="d-flex">
                    <input type="text" name="key" class="form-control" placeholder="Search..." value="{{ request('key') }}">
                    <button class="btn bg-dark text-white" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

@isset($posts)
<div class="row px-xl-5">

    @foreach ($posts as $post )
    <div class="col-lg-12 h-auto mb-30">
        <div class="h-100 bg-light p-30">
            <h3 class="mt-4">{{ $post->title }}</h3>
            <h5 class="mb-2" id="content">Company| {{ $post->company }}</h5>
            <h5 class="mb-2" id="content">Location| {{ $post->location }}</h5>
            <h5 class="mb-2" id="content">Job Description| {{ $post->description }}</h5>
            <div class="updated pb-4">
                <p class="card-text font-italic"><small class="text-muted">Last updated {{ $post->updated_at->format('j-F-Y') }} ago</small></p>
            </div>
            {{-- <div class="d-flex mb-3 pt-1">
                <a href="#">
                    <span class="badge rounded-pill bg-primary text-white pl-2 pr-2 pt-1 pb-1">{{ $post->visibility }}</span>
                </a>
            </div> --}}

            <form action="{{ route('applyJob') }}" method="post">
                @csrf
                <input type="hidden" name="postId" value="{{ $post->id }}">
                @if (Auth::check())

                    @isset($applied)
                        @foreach ($applied as $apply)
                            @if ($apply == $post->id)
                                {{-- <button class="btn btn-sm btn-primary mt-3 apply-option applied">Applied</button> --}}
                                <strong class="text-danger">Applied</strong>

                            {{-- @else
                            <button type="submit" class="btn btn-sm btn-outline-primary mt-3">Apply</button> --}}

                            @endif
                        @endforeach
                    @endisset
                    <div class="apply">
                        <button type="submit" class="btn btn-sm btn-outline-primary mt-3">Apply</button>
                    </div>



                @else
                <button type="submit" class="btn btn-sm btn-outline-primary mt-3">Apply</button>
                @endif
            </form>
        </div>
    </div>
    @endforeach
</div>
@endisset
</div>

{{-- <div class="animsition mt-4">
<div class="page-wrapper pt-4 bg-white">
    <div class="">
        <div class="container mt-4">
            @isset($posts)
                <div class="row">
                    @foreach ($posts as $post )
                        <div class="col-lg-12 mb-4 pb-4">
                            <div class="card mb-3" style="min-height: 290px;">
                                <img src="{{ asset('/images/'.$post->image) }}" style="width:500px" class="card-img-top" alt="">
                                <div class="card-body">
                                    <div class="title pb-4">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                    </div>
                                    <div class="content">
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                    <div class="updated pb-4">
                                        <p class="card-text font-italic"><small class="text-muted">Last updated {{ $post->updated_at->format('j-F-Y') }} ago</small></p>
                                    </div>
                                    <div>
                                        <a href="{{ route('like', $post->id) }}" class=" text-black-50 ">
                                            Likes <span class="badge rounded-pill bg-primary text-white">{{ $post->likes }}</span>
                                        </a>
                                    </div>
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-floating">
                                            <label for="floatingTextarea2">Comments</label>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-outline-primary mt-3">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
    </div>
</div>
</div> --}}

@endsection
