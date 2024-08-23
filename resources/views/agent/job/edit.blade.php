@extends('agent.layouts.master')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="mb-4">
                    <a href="{{ route('agent#job#list') }}" class="au-btn au-btn-icon au-btn--small back-btn">Back</a>
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

                <form action="{{ route('agent#job#update', $job->id) }}" method="post" enctype="multipart/form-post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="text-b">Title</label>
                        <input type="text" name="title" value="{{ $job->title }}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="description" class="text-b">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{ $job->description }}</textarea>

                    </div>

                    <div class="form-group">
                        <label for="location" class="text-b">Location</label>
                        <input type="text" name="location" value="{{ $job->location }}" class="form-control" id="location">
                    </div>

                    <div class="form-group">
                        <label for="company" class="text-b">Company</label>
                        <input type="text" name="company" value="{{ $job->company }}" class="form-control" id="company">
                    </div>

                    <div class="form-group">
                        <label for="category" class="text-b">Choose Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}" @if ($c->name == $category_name)
                                selected
                            @endif>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="visibility" class="text-b">Visibility</label>
                        <select name="visibility" id="visibility" class="form-control">
                            <option value="Public" @if ($job->visibility == 'Pubilc')
                                selected
                            @endif>Public</option>
                            <option value="Private" @if ($job->visibility == 'Private')
                                selected
                            @endif>Private</option>
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
