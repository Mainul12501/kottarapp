@extends('backend.master')

@section('title')
    Manage Skills
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Skills', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-capitalize float-start">Manage Skills </h4>
                            <a href="{{ route('skills.create') }}" class="btn btn-success float-end">
                                {{--                                                        <i class="mdi mdi-plus"></i>--}}
                                Create
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Skill Category</th>
                                        <th>Skill sub Category</th>
                                        <th>Skill Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($skills as $skill)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $skill->skillCategory->category_name }}</td>
                                            <td>{{ $skill->skillSubCategory->sub_category_name }}</td>
                                            <td>{{ $skill->skill_name }}</td>
                                            <td>{{ $skill->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                {{--                                                        <a href="" class="btn btn-primary btn-sm mt-1 py-0 px-1">--}}
                                                {{--                                                            <i class="dripicons-preview"></i>--}}
                                                {{--                                                        </a>--}}
                                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1">
                                                    <i class="dripicons-document-edit f-s-11"></i>
                                                </a>
                                                <form action="{{ route('skills.destroy', $skill->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this skill?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-1 py-0 px-1">
                                                        <i class="dripicons-trash f-s-11"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
