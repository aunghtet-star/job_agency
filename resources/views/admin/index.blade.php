@extends('admin.layouts.master')

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
                                <h2 class="title-1">Admin Profile</h2>

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

        <form action="{{ route('user#update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="" value="{{ $data->email }}" class="form-control" id="" disabled>
                <input type="hidden" name="email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="number" name="phone" value="{{ $data->phone }}" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" id="" cols="30" rows="10" class="form-control" >{{ $data->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <input type="text" name="role" value="{{ $data->role }}" class="form-control" >
            </div>

            <div class="form-group">
                <label for="">Image</label>
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
