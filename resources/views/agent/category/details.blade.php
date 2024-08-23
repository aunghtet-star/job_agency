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

                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title">{{ $detail->name }}</h5>
                      <p class="card-text"><small class="text-muted">Last updated {{ $detail->updated_at }} mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection
