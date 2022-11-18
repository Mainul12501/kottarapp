<div>
    {{-- The whole world belongs to you. --}}
    <table id="dataTable" class="table table-striped dt-responsive table-responsive nowrap w-100">
        <thead>
        <tr>
            <th>#</th>
            <th>Skill Category</th>
            <th>Skill Sub Category</th>
            <th>Title</th>
            <th>Description</th>
            <th>Budget</th>
            <th>Required Skills</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $job->skillCategory->category_name }}
                </td>
                <td>{{ $job->skillSubCategory->sub_category_name }}</td>
                <td>{{ $job->project_title }}</td>
                <td>{!! $job->project_description !!}</td>
                <td>${{ $job->budget }}</td>
                <td>@foreach($job->skills as $key => $skill) {{ $skill->skill_name }}@if((count($job->skills)-1) != $key), @endif @endforeach</td>
                <td wire:ignore>
{{--                    {{ $job->status == 0 ? 'Pending' : '' }}--}}
{{--                    {{ $job->status == 1 ? 'Approved' : '' }}--}}
{{--                    {{ $job->status == 2 ? 'Completed' : '' }}--}}
{{--                    {{ $job->status == 3 ? 'Rejected' : '' }}--}}
                    <select class="form-control" wire:model="job_status" wire:change="changeStatus({{ $job->id }},$event.target.value)" id="">
                        <option value="0" {{ $job->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $job->status == 1 ? 'selected' : '' }}>Approved</option>
                        <option value="2" {{ $job->status == 2 ? 'selected' : '' }}>Completed</option>
                        <option value="3" {{ $job->status == 3 ? 'selected' : '' }}>Rejected</option>
                    </select>
                </td>
                <td>
                    <a href="" class="btn btn-primary btn-sm mt-1 py-0 px-1" title="View">
                        <i class="dripicons-preview"></i>
                    </a>
                    <a href="{{ route('approve-job', ['id' => $job->id]) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1" title="Approve">
                        <i class="dripicons-arrow-thin-up f-s-11"></i>
                    </a>
                    <form action="" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this Admin?');">
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
    @if (session()->has('message'))
        <script>
            toastr.success("{{ session()->get('message') }}");
        </script>
    @endif
</div>
