<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function SiteSetting()
    {

        return view('Admin.setting.site-setting');
    }

    public function saveSettings(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'site_url' => 'required|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'profession' => 'nullable|string|max:100',
            'degree' => 'nullable|string|max:100',
            'keywords' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'cv_file' => 'nullable|mimes:pdf|max:2048',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $setting = SiteSetting::firstOrNew(['id' => 1]);

        // Upload Profile Image
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); // Save to public/images/
            $validated['profile_image'] = 'images/' . $imageName;
        }

        // Upload CV File
        if ($request->hasFile('cv_file')) {
            $cv = $request->file('cv_file');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('cv'), $cvName); // Save to public/cv/
            $validated['cv_file'] = 'cv/' . $cvName;
        }

        $setting->fill($validated)->save();

        return redirect()->back()->with('success', 'Site settings saved successfully.');
    }
}
