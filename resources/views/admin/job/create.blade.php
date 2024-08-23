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
                            <h2 class="title-1 text-b">Create New Post</h2>
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
                    <a href="{{ route('job#list') }}" class="au-btn au-btn-icon au-btn--small back-btn">Back</a>
                </div>

                <form action="{{ route('job#create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="text-b">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-b">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="location" class="text-b">Location</label>
                        <input type="text" name="location" class="form-control" id="location">
                    </div>

                    <div class="form-group">
                        <label for="company" class="text-b">Company</label>
                        <input type="text" name="company" class="form-control" id="company">
                    </div>

                    <div class="form-group">
                        <label for="category" class="text-b">Choose Category</label>
                        <select name="category" id="category">
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="visibility" class="text-b">Visibility</label>
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="Public" selected>Public</option>
                            <option value="Private">Private</option>
                        </select>
                    </div>

                    <input type="submit" value="Create" class="au-btn au-btn-icon au-btn--small y-btn">

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
    $('#visibility').select2();
    $('#category').select2();
</script>

@endsection
