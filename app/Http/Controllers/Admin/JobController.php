<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience' => 'required|string',
            'salary' => 'required|string',
            'location' => 'required|string',
            'extra_info' => 'nullable|string',
            'company_name' => 'required|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'skills' => 'required|array'
        ]);

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('company-logos', 'public');
            $validated['company_logo'] = $path;
        }

        // Remove skills from validated data as it's handled separately
        $skills = $validated['skills'];
        // unset($validated['skills']);
        // dd($validated);
        // Create the job
        $job = Job::create($validated);

        // Create or find skills and attach them
        $skillIds = collect($skills)->map(function($skillName) {
            return Skill::firstOrCreate(['name' => $skillName])->id;
        });

        // Attach skills using IDs
        $job->skills()->attach($skillIds);
        
        // Modified redirect to use the full page route instead of popup
        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job posted successfully!');
    }

    public function index()
    {
        return Inertia::render('Jobs/Index', [
            'jobs' => Job::with('skills')->get()
        ]);
    }

    public function destroy(Job $job)
    {
        try {
            $job->delete();
            return redirect()->back()->with('success', 'Job deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete job');
        }
    }
} 