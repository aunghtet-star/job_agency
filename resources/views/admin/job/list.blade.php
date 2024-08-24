@extends('admin.layouts.master')

@section('title', 'job List Page')

@section('content')


    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 text-b">Job Posts List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('job#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--small y-btn">
                                    <i class="zmdi zmdi-plus"></i>Add Post
                                </button>
                            </a>
                        </div>
                    </div>

                    @if (session('createSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i>
                                {{ session('createSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    @if (session('deleteSuccess'))
                        <div class="col-4 offset-8">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i>
                                {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif


                    <div class="col-3 offset-9">
                        <form action="{{ route('job#list') }}" method="GET">
                            @csrf
                            <div class="d-flex">
                                <input type="text" name="key" class="form-control" placeholder="Search..." value="{{ request('key') }}">
                                <button class="btn bg-dark text-white" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    @if (count($jobs) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Visibility</th>
                                        <th>Created Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job )
                                        <tr class="tr-shadow">
                                            <td>{{ $job->id }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->description }}</td>
                                            @foreach ($user as $author)
                                                @if ($author->id == $job->author_id)
                                                    <td>{{ $author->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $job->location }}</td>
                                            <td>{{ $job->company }}</td>
                                            @foreach ($allCategory as $all)
                                                @if ($all->id == $job->category_id)
                                                    <td>{{ $all->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $job->visibility }}</td>
                                            <td>{{ $job->created_at->format('j-F-Y') }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('job#details', $job->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('job#edit', $job->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('job#delete', $job->id) }}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no job post Here!</h3>
                    @endif
                    <!-- END DATA TABLE -->

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
@endsection
