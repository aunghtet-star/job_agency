@extends('agent.layouts.master')

@section('title', 'Profile Page')

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
                                <h2 class="title-1 text-b">User Profile Page</h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agent#user#update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="text-b">User Name</label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="">
            </div>
            {{-- <div class="form-group">
                <label for="">Enter Password</label>
                <input type="password" name="password" class="form-control" id="">
            </div> --}}
            <div class="form-group">
                <label for="" class="text-b">Email</label>
                <input type="email" name="" value="{{ $data->email }}" class="form-control" id="" disabled>
                <input type="hidden" name="email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="" class="text-b">Phone Number</label>
                <input type="number" name="phone" value="{{ $data->phone }}" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="" class="text-b">Address</label>
                <input type="textarea" name="address" value="{{ $data->address }}" class="form-control" id="">
            </div>
            {{-- <div class="form-group">
                <label for="">Role</label>
                <select name="role" id="role" class="form-control" disabled>
                    <option value="admin">admin</option>
                    <option value="agent" selected>agent</option>
                    <option value="user">user</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="" class="text-b">Role</label>
                <input type="text" name="role" value="{{ $data->role }}" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="" class="text-b">Image</label>
                <div>
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('admin/images/icon/avatar-01.jpg') }}" class="img-thumbnail shadow-sm"/>
                    @else
                        <img src="{{ asset('storage/'.$data->image) }}" class="img-thumbnail shadow-sm">
                    @endif
                </div>
                <div>
                    <input type="file" name="image" class="form-control" id="">
                </div>
            </div>

            <input type="submit" value="Update" class="au-btn au-btn-icon au-btn--small y-btn mt-4">

        </form>
        </div>
    </div>
</div>

@endsection
