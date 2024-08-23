@extends('admin.layouts.master')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="mb-4">
                    <a href="{{ route('user#list') }}" class="au-btn au-btn-icon au-btn--small back-btn">Back</a>
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

                <form action="{{ route('user#update', $user->id) }}" method="post" enctype="multipart/form-post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="text-b">User Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="">
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div> --}}
                    <div class="form-group">
                        <label for="" class="text-b">Email</label>
                        <input type="email" name="" value="{{ $user->email }}" class="form-control" id="" disabled>
                        <input type="hidden" name="email" value="{{ $user->email }}">

                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Phone Number</label>
                        <input type="number" name="phone" value="{{ $user->phone }}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Address</label>
                        <input type="textarea" name="address" value="{{ $user->address }}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-b">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin">admin</option>
                            <option value="agent">agent</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <input type="submit" value="Update" class="au-btn au-btn-icon au-btn--small y-btn mt-4">

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
