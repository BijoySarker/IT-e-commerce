<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index_skill', compact('skills'));
    }

    public function index_frontend()
    {
        $skills = Skill::all();
        return view('frontend.skill', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create_skill');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        // Store the logo
        $logoPath = $request->file('logo_path')->store('frontend/assets/img/icons', 'public');

        Skill::create([
            'title' => $validated['title'],
            'logo_path' => $logoPath,
            'description' => $validated['description'],
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill added successfully!');
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.create_skill', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $skill = Skill::findOrFail($id);

        // Update logo if a new one is uploaded
        if ($request->hasFile('logo_path')) {
            $logoPath = $request->file('logo_path')->store('frontend/assets/img/icons', 'public');
            $skill->logo_path = $logoPath;
        }

        $skill->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }
}
