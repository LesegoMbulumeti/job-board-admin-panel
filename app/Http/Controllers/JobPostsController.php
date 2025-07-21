<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job_posts;
use App\Http\Requests\StoreJobPostRequest;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class JobPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobPost = Job_posts::latest()->paginate(10);
        return inertia('admin/job_posts/index', [
            'jobPost' => $jobPost,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('admin/job_posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {
        Job_posts::create($request->validated());
        return redirect()->route('admin.job_posts.index')->with('success', 'Job post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $jobPost = Job_posts::findorFail($id);
            return inertia('admin/job_posts/show', ['jobPost' => $jobPost]);
        }catch (ModelNotFoundException $e) {
            Log::error("Job not found: ID {$id}", ['exception' => $e]);
            return redirect()->route('admin.job-job_posts.index')->with('error', 'Job post not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {
            try {
                $jobPost = Job_posts::findOrFail($id);
                return inertia('admin/job_posts/edit', ['jobPost' => $jobPost]);
            } catch (ModelNotFoundException $e) {
                Log::error("Job not found when trying to edit: ID {$id}", ['exception' => $e]);
                return redirect()->route('admin.job_posts.index')->with('error', 'Job post not found.');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobPostRequest $request, string $id)
    {   try{

    
                $job_posts = Job_posts::findOrFail($id);
                // Update the job post with validated data
                // The request is validated by StoreJobPostRequest
                $job_posts->update($request->validated());
                return redirect()->route('admin.job_posts.index')->with('success', 'Job post updated successfully.');

            }   catch (ModelNotFoundException $e){
                // Log the error or handle it as needed
                log::error("Failed to update job: ID {$id} not found", ['exception' => $e]);
                return redirect()->route('admin.job_posts.index')->with('error', 'Job post not found.');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $job_posts = Job_posts::findOrFail($id);
            // Soft delete (sets deleted_at)
            $job_posts->delete();
            return redirect()->route('admin.job_posts.index')->with('success', 'Job post deleted successfully.');
        } catch (ModelNotFoundException $e) {
            // Log the error or handle it as needed
            Log::error("Failed to delete job: ID {$id} not found", ['exception' => $e]);
            // Redirect with an error message
            return redirect()->route('admin.job_posts.index')->with('error', 'Job post not found.');
        }
    }
        
}
