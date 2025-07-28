<?php
namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');

        // Search using Eloquent models
        $emails = Contact::where('subject', 'LIKE', "%{$query}%")->pluck('subject');
        $projects = Project::where('name', 'LIKE', "%{$query}%")->pluck('name');
        $certificates = Certificate::where('name', 'LIKE', "%{$query}%")->pluck('name');
        $results = $emails->merge($projects)->merge($certificates);
        $output = '';
        foreach ($results as $row) {
            $output .= '<a href="#" class="list-group-item list-group-item-action search-item">'.$row.'</a>';
        }
        return $output ?: '<a class="list-group-item">No results found</a>';
    }
}
