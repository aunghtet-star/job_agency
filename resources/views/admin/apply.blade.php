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
                                <h2 class="title-1 text-b">Apply User List</h2>

                            </div>
                        </div>
                    </div>

                    @if (count($apply) != 0)
                        <div class="table-responsive table-responsive-data2 ">
                            <table class="table table-data2 table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($apply as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        @foreach ($jobs as $job)
                                            @if ($job->id == $data->post_id)
                                                <td>{{ $job->title }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($users as $user)
                                            @if ($user->id == $data->user_id)
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->address }}</td>
                                            @endif
                                        @endforeach


                                        <td>{{ $data->created_at->format('j-F-Y') }}</td>
                                    </tr>

                                    @endforeach





                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-secondary text-center mt-5">There is no job post Here!</h3>
                    @endif
                    <!-- END DATA TABLE -->

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
@endsection
