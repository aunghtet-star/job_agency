@extends('admin.layouts.master')


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
                            <h2 class="title-1 text-b">Create New User</h2>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('user#list') }}" class="au-btn au-btn-icon au-btn--small back-btn">Back</a>
                </div>

                <form action="{{ route('user#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="text-b">Enter Name</label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Enter Email</label>
                        <input type="email" name="email" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Enter Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Enter Phone</label>
                        <input type="number" name="phone" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Enter Address</label>
                        <input type="textarea" name="address" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin" selected>admin</option>
                            <option value="agent">agent</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <input type="submit" value="Create" class="au-btn au-btn-icon au-btn--small y-btn mt-4">

                </form>

            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#role').select2();
</script>

@endsection
