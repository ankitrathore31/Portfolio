<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function AddProject()
    {
        return view('Admin.project.add-project');
    }

    public function StoreProject(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'keyword' => 'required|string',
            'gihub_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->keyword = $request->keyword;
        $project->github_link = $request->github_link;
        $project->live_link = $request->live_link;

        $destination = public_path('images');

        if ($request->hasFile('image')) {
            $imageName = time() . '_image.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destination, $imageName);
            $project->image = 'images/' . $imageName;
        }


        $project->save();

        return redirect()->route('project.list')->with('success', 'Project added successfully');
    }

    public function EditProject($id)
    {

        $project = Project::findorFail($id);
        return view('Admin.project.edit-project', compact('project'));
    }

    public function UpdateProject(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'keyword' => 'required|string',
            'gihub_link' => 'nullable|url',
            'live_link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $project = Project::findorFail($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->keyword = $request->keyword;
        $project->github_link = $request->github_link;
        $project->live_link = $request->live_link;

        $destination = public_path('images');

        if ($request->hasFile('image')) {
            
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $imageName = time() . '_image.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($destination, $imageName);

            $project->image = 'images/' . $imageName;
        }


        $project->save();

        return redirect()->route('project.list')->with('success', 'Project update successfully');
    }

    public function DeleteProject($id)
    {

        $project = Project::findorFail($id);

        if (!empty($project->image) && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }

    public function ProjectList()
    {
        $project = Project::get();
        return view('Admin.project.project-list', compact('project'));
    }

    public function ProjectView($id)
    {
        $project = Project::findorFail($id);
        return view('Admin.project.view-project', compact('project'));
    }
}
