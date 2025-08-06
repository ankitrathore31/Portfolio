<?php

use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

if(!function_exists('get_formated_date')){
    function get_formated_date($date, $format){
        $formattedDate = date($format, strtotime($date));
        return $formattedDate;
    }
}

if(!function_exists('total_project')){
    function total_project(){
        $data = Project::count();
        return $data;
    }
}

if(!function_exists('This_Month_Projects')){
    function This_Month_Projects(){
        $data = Project::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();
        return $data;
    }
}

if(!function_exists('This_Year_Projecrs')){
    function This_Year_Projecrs(){
        $data = Project::whereYear('created_at', now()->year)
                ->count();
        return $data;
    }
}

if(!function_exists('limit_project_list')){
    function limit_project_list(){
        $limit_project = Project::orderBy('created_at', 'desc')->limit(5)->get();
        return $limit_project;
    }
}

if(!function_exists('limit_project')){
    function limit_project(){
        $limit_project = Project::orderBy('created_at', 'desc')->limit(2)->get();
        return $limit_project;
    }
}

if(!function_exists('getMonthProjectCount')){
    function getMonthProjectCount(){
    $months = collect(range(1, 12))->map(function($month){
        return str_pad($month, 2, '0', STR_PAD_LEFT);
    });

    $projectCount = Project::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', now()->year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('count', 'month');

    return $months->map(function($month) use ($projectCount){
        return $projectCount->get((int)$month, 0);
    })->toArray();

    }
}

if(!function_exists('total_certificates')){
    function total_certificates(){
        $data = Certificate::count();
        return $data;
    }
}

if(!function_exists('This_Year_Certifictaes')){
    function This_Year_Certifictaes(){
        $data = Certificate::whereYear('created_at', now()->year)->count();
        return $data;
    }
}

if(!function_exists('total_vistior')){
    function total_vistior(){
        $data = Visitor::count();
        return $data;
    }
}

if(!function_exists('today_visitor')){
    function today_visitor(){
        $data = Visitor::whereDate('visit_date', now()->toDateString())->count();
        return $data;
    }
}

if(!function_exists('limit_email_list')){
    function limit_email_list(){
        $limit_project = Contact::orderBy('created_at', 'desc')->limit(5)->get();
        return $limit_project;
    }
}

if(!function_exists('getMonthEmailCount')){
    function getMonthEmailCount(){
    $months = collect(range(1, 12))->map(function($month){
        return str_pad($month, 2, '0', STR_PAD_LEFT);
    });

    $projectCount = Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', now()->year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('count', 'month');

    return $months->map(function($month) use ($projectCount){
        return $projectCount->get((int)$month, 0);
    })->toArray();

    }
}

if (!function_exists('monthly_visitors')) {
    function monthly_visitors() {
        $visitors = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fill missing months with 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $visitors[$i] ?? 0;
        }

        return $monthlyData;
    }
}
