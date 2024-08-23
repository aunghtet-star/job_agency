@extends('admin.layouts.master')

@section('title', 'User Listing Page')

@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1 text-b">User List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('user#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--small y-btn">
                                    <i class="zmdi zmdi-plus"></i>Add User
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('deleteSuccess'))
                <div class="row">
                    <div class="col-4 offset-8">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-xmark"></i>
                            {{ session('deleteSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('message'))
                <div class="col-4 offset-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-xmark"></i>
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            {{-- <div class="row">
                <div class="col-12">
                    <form action="{{ route('user#search') }}" method="GET">
                        <div class="row align-items-end ">
                            <div class="form-group col-3">
                                <input type="text" name="keyword" class="form-control" placeholder="Search by keyword" value="{{ request()->input('keyword') }}">
                            </div>
                            <div class="form-group col-2">
                                <select name="role" class="form-control">
                                    <option value="admin" {{ request()->input('role') == 'admin' ? 'selected' : '' }}>admin</option>
                                    <option value="agent" {{ request()->input('role') == 'agent' ? 'selected' : '' }}>agent</option>
                                    <option value="user" {{ request()->input('role') == 'user' ? 'selected' : '' }}>user</option>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label for="date_from">From</label>
                                <input type="date" name="date_from" class="form-control" value="{{ request()->input('date_from') }}">
                            </div>
                            <div class="form-group col-2">
                                <label for="date_to">To</label>
                                <input type="date" name="date_to" class="form-control" value="{{ request()->input('date_to') }}">
                            </div>
                            <div class="form-group col-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div> --}}

            @isset($data)
                <div class="table-responsive table-responsive-data2 mt-4">
                    <table class="table table-data2 table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user )
                                <tr class="tr-shadow">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('user#details', $user->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('user#edit', $user->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('user#delete', $user->id) }}">
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
            @endisset
        </div>
    </div>
</div>

@endsection
