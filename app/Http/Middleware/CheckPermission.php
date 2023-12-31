<?php

namespace App\Http\Middleware;

use App\Helpers\ChvInit;
use Closure;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_url = $request->route()->uri();
        if ($current_url == '/' || $current_url == 'home'|| $current_url == 'login') {
            return $next($request);
        }
        
        $current_route = $request->route()->action['as'];

        $permission = Permission::where('name', $current_route)->first();

        if (!$permission) {
            return $next($request);
        }
     
        if (auth()->user() && auth()->user()->checkSpPermission($current_route)) {
            return $next($request);
        } else {
            if($request->ajax()) {
                return response()->json(['notify'=> ['danger'=>__('Insufficient Permission!')]]);
            } else {
                Session::flash('message', 'Insufficient Permission');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/');
            }
        }
    }

    public function checkInstalled()
    {
        return file_exists(storage_path('iniSys'));
    }

    public function checkSys()
    {
        $result = true;
        $file_lines = file(storage_path('iniSys'));
        $chvInit = new ChvInit();
        
        if ($result == false) {
            unlink(storage_path('iniSys'));
            unlink(storage_path('installed'));
            Session::flash('message', __('Sorry your license is invalid. Please install again or contact support!'));
        }
        return $result;
    }

}
