<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertiController extends Controller
{
    public function AddCerti()
    {
        return view('Admin.certificate.add-certi');
    }

    public function StoreCerti(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpeg,png,jpg,pdf',
            'title'   => 'required|string',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                // Corrected path
                $file->move(public_path('images'), $filename);

                Certificate::create([
                    'file_path' => 'images/' . $filename, // stored path
                    'title'     => $request->title,
                ]);
            }
        }

        return redirect()->route('list.certificate')->with('success', 'Certificates uploaded successfully.');
    }


    public function DeleteCerti($id)
    {

        $cert = Certificate::findorFail($id);
        if (!empty($cert->file_path) && file_exists(public_path($cert->file_path))) {
            unlink(public_path($cert->file_path));
        }

        $cert->delete();
        return redirect()->back()->with('success', 'Certificate deleted successfully. ');
    }

    public function certiList()
    {
        $cert = Certificate::get();
        return view('Admin.certificate.certi-list', compact('cert'));
    }
}
