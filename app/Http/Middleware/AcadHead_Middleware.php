<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AcadHead_Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


// I added this code for the role management
// Added on 06/19/23 1:55 PM
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            // Admin == 1
            // Faculty member == 2
            // Staff == 3
            // Director == 4
            if (Auth::user()->foreign_role_id == '1') {
                return $next($request);
            } else {
                return back()->with('error', 'Access Denied because you are not an Admin');
            }
        }
        else {
            // Add a condition to prevent redirecting when already on the login page

                return redirect()->route('/')->with('error', 'Please login first');
        }

        return $next($request);
    }
 }
