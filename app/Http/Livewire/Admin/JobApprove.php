<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\JobPost;
use Livewire\Component;

class JobApprove extends Component
{
    public $job_status, $job;
    public function render()
    {
        return view('livewire.admin.job-approve', [
            'jobs'  => JobPost::latest()->get(),
        ]);
    }

    public function mount()
    {
//        $this->job_status = 1;
    }

    public function changeStatus ($jobId, $vel)
    {
        $this->job = JobPost::find($jobId)->update(['status' => $this->job_status]);
        session()->flash('message', 'Gig status updated successfully.');
//        session()->flash('message', $vel);
    }
}
