@extends('backend.master')

@section('title')
    Manage Job Post
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Job Post', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-capitalize float-start">Manage Job Post</h4>
{{--                            <a href="{{ route('job-post.create') }}" class="btn btn-success float-end">--}}
{{--                                --}}{{--                                                        <i class="mdi mdi-plus"></i>--}}
{{--                                Create--}}
{{--                            </a>--}}
                        </div>
                        <div class="card-body">
                            @livewire('admin.job-approve')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@section('script')
    <!-- Datatables js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                scrollX: true,
            });
        });

    </script>
@endsection
