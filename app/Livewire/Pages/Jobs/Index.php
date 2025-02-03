<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    public function mount()
    {
        $this->jobs = [
            ...Job::all()->map(function($job) {
                return [
                    "id" => $job->id,
                    "title" => $job->title,
                    "description" => $job->description,
                    "company_name" => $job->company_name,
                    "company_logo" => Storage::url($job->company_logo),
                    "experience" => $job->experience,
                    "salary" => $job->salary,
                    "location" => $job->location,
                    "skills" => $job->skills()->pluck('name')->toArray(),
                    "extra" => array_filter([
                        $job->extra_info,
                        'Full-Time'
                    ])
                ];
            })->toArray(),
        ];
    }

    public function render()
    {
        return view('livewire.pages.jobs.index');
    }
}
