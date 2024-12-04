<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index_project', compact('projects'));
    }

    public function index_frontend()
    {
        $projects = Project::all();
        return view('frontend.project', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create_project');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'link' => 'required|url',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('frontend/assets/img/project_images'), $imageName);

        Project::create([
            'title' => $request->title,
            'image' => "frontend/assets/img/project_images/{$imageName}",
            'description' => $request->description,
            'link' => $request->link,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }


    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id); // Use $project instead of $skill for clarity and consistency.
        return view('admin.project.create_project', compact('project')); // Pass $project to the view.
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'link' => 'required|url',
        ]);

        $project = Project::findOrFail($id);

        // If a new image is uploaded, handle it
        if ($request->hasFile('image')) {
            // Delete the old image from storage if it exists
            if ($project->image && file_exists(public_path('frontend/assets/img/project_images/' . basename($project->image)))) {
                unlink(public_path('frontend/assets/img/project_images/' . basename($project->image)));
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('frontend/assets/img/project_images'), $imageName);

            // Update the image path in the database
            $project->image = "frontend/assets/img/project_images/{$imageName}";
        }

        // Update other fields
        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'link' => $validated['link'],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete the image if it exists
        if ($project->image && file_exists(public_path('frontend/assets/img/project_images/' . $project->image))) {
            unlink(public_path('frontend/assets/img/project_images/' . $project->image));
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
