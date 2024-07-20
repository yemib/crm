<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GeneralPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
        public function  getoutcome($manage){


        }

    public function handle(Request $request, Closure $next)
    {
        $currentUrl = url()->current();

      $message  =  "You did not have the permission to view the page";



     if( route('employee.active.warranties')  ==    $currentUrl){
     $manage  = permission_count(auth()->user()->id  ,  46);
     if( $manage == 0) {

       if(auth()->user()->is_admin  == 0 ){
        $back  =  back()->with('error'  , $message) ;
          return $back ;
       }

     }

    }


     if(  route('cal_login')   ==    $currentUrl){

       if(auth()->user()->is_admin  == 0 ){
        $back  =  back()->with('error'  , $message) ;
          return $back ;
       }

    }




     if( route('employee.void.warranties')  ==    $currentUrl  ||   strpos( $currentUrl, "void_warranty") !== false ){
     $manage  = permission_count(auth()->user()->id  ,  48);
     if( $manage == 0) {
       if(auth()->user()->is_admin  == 0 ){
        $back  =  back()->with('error'  ,  $message) ;
          return   $back;
       }

     }

    }

//



if (strpos( $currentUrl, "assigned_invoices") !== false) {
    $manage  = permission_count(auth()->user()->id  ,  47);
    if( $manage == 0) {
        if(auth()->user()->is_admin  == 0 ){
         $back  =  back()->with('error'  ,  $message) ;
           return   $back;
        }

      }
}

if (strpos( $currentUrl, "jobs") !== false) {
    $manage  = permission_count(auth()->user()->id  ,  51);
    if( $manage == 0) {
        if(auth()->user()->is_admin  == 0 ){
         $back  =  back()->with('error'  ,  $message) ;
           return   $back;
        }

      }
}




if (strpos( $currentUrl, "calender") !== false) {
    $manage  = permission_count(auth()->user()->id  ,  29);
    if( $manage == 0) {
        if(auth()->user()->is_admin  == 0 ){
         $back  =  back()->with('error'  ,  $message) ;
           return   $back;
        }

      }
}



if (strpos( $currentUrl, "new_projects") !== false) {
    $manage  = permission_count(auth()->user()->id  ,  50);
    if( $manage == 0) {
        if(auth()->user()->is_admin  == 0 ){
         $back  =  back()->with('error'  ,  $message) ;
           return   $back;
        }

      }
}







if (strpos( $currentUrl, "services") !== false  || strpos( $currentUrl, "settings") !== false
 || strpos( $currentUrl, "countries") !== false
  ||  strpos( $currentUrl, "activity-logs" ) !== false
  ||  strpos( $currentUrl, "translation-manager" ) !== false
  ) {

    if( auth()->user()->is_admin != 1) {

         $back  =  back()->with('error'  ,  $message) ;
           return   $back;


      }
}








        return $next($request);
    }
}
