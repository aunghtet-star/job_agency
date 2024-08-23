@extends('agent.layouts.master')


@section('content')

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="mb-4">
                    <a href="{{ route('agent#category#list') }}" class="au-btn au-btn-icon au-btn--small back-btn">Back</a>
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

                <form action="{{ route('agent#category#update', $category->id) }}" method="post" enctype="multipart/form-post">
                    @csrf
                    <div class="form-group">
                        <label for="" class="text-b">Category Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="">
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
