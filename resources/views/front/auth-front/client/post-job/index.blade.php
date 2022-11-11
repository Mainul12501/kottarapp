@extends('front.auth-front.auth-master')

@section('title')
    manage jobs
@endsection

@section('body')
    <div class="row job_section">
        <div class="col-sm-12">
            <div class="jm_headings">
                <h6>Your listings are shown in the table below.</h6>
            </div>
            <div class="table-cont ">

                <table class="table table-responsive display" id="datatable-buttons">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Exp. Lv</th>
                        <th>Total Budget</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($jobPosts as $jobPost)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jobPost->project_title }}</td>
                                <td>{{ $jobPost->job_unique_code }}</td>
                                <td>{{ $jobPost->experience_level }}</td>
                                <td>${{ $jobPost->budget }}</td>
                                <td>{!! substr_replace($jobPost->project_description, '', 200) !!}</td>
                                <td>
                                    {{ $jobPost->status == 0 ? 'Pending' : '' }}
                                    {{ $jobPost->status == 1 ? 'Approved' : '' }}
                                    {{ $jobPost->status == 2 ? 'Completed' : '' }}
                                    {{ $jobPost->status == 3 ? 'Rejected' : '' }}
                                </td>
                                <td>
                                    <ul class="job-dashboard-actions" >
                                        <li>
                                            <a href="{{ route('client.job-post.edit', $jobPost->id) }}" class="job-dashboard-action-edit">
{{--                                                Edit--}}
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="job-dashboard-action-mark_filled text-danger">
{{--                                                Deactivate--}}
                                                <i class="fas fa-arrow-circle-down"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="job-dashboard-action-delete">
{{--                                                Delete--}}
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

{{--            @foreach($jobPosts as $jobPost)--}}
{{--                <a href="" class="nav-link">--}}
{{--                    <div class="card card-body mt-2">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-9">--}}
{{--                                <h2>{{ $jobPost->project_title }}</h2>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3">--}}
{{--                                <label class="mx-auto fw-bolder" style="font-size: 30px">${{ $jobPost->budget }}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}
        </div>
    </div>
@endsection

@section('style')
    <style>
        .job-dashboard-actions li {
            display: table-caption;
            /*padding: 2px 0;*/
        }
    </style>
    <!-- Datatables css -->
    <link href="{{ asset('/') }}frontend/assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/datatables.min.css"/>--}}
@endsection

@section('script')
    <!-- Datatables js -->
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/fh-3.2.4/r-2.3.0/datatables.min.js"></script>--}}
    <script type="text/javascript" src="{{ asset('/') }}frontend/assets/js/datatables.min.js"></script>
    <script>
        $(function () {
            $('#datatable-buttons').DataTable({
                // dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        })
    </script>
@endsection
