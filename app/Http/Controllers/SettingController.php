<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function SiteSetting()
    {
        $setting = SiteSetting::first();
        return view('Admin.setting.site-setting', compact('setting'));
    }

    public function saveSetting(Request $request)
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
            'github' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'profile_image' => ['nullable', 'image', 'max:10240'],
            'cv_file' => ['nullable', 'mimes:pdf', 'max:10240'],
        ]);

        // Fetch existing or create new
        $setting = SiteSetting::firstOrNew(['id' => 1]);
        if (!$setting->exists) {
            $setting->id = 1;
        }


        if ($request->hasFile('profile_image')) {
            if ($setting->profile_image && file_exists(public_path($setting->profile_image))) {
                unlink(public_path($setting->profile_image));
            }

            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $setting->profile_image = 'images/' . $imageName;
        }

        if ($request->hasFile('cv_file')) {
            if ($setting->cv_file && file_exists(public_path($setting->cv_file))) {
                unlink(public_path($setting->cv_file));
            }

            $cv = $request->file('cv_file');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('images'), $cvName);
            $setting->cv_file = 'images/' . $cvName;
        }

        $setting->fill($validated);

        $setting->save();

        return redirect()->back()->with('success', 'Site settings saved successfully.');
    }
}
