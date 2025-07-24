<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $today = Carbon::today();

        $exixts = Visitor::where('ip_address', $ip)
            ->whereDate('visit_date', $today)
            ->exists();

        if(!$exixts){
            Visitor::create([
                'ip_address' => $ip,
                'visit_date' => $today,
            ]);
        }
        return $next($request);
    }

}
