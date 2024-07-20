<?php

namespace App\Http\Middleware;

use App\Http\Controllers\SettingController;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class mail_setting_change
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

        $smtpConfig   =  Setting::whereGroup(1)->pluck('value', 'key')->toArray();

        if ($smtpConfig) {
            $config = [
                'driver' => 'smtp',
                'host' => $smtpConfig['host_smtp'],
                'port' => $smtpConfig['port_smtp'],
                'username' => $smtpConfig['email_smtp'],
                'password' => $smtpConfig['password_smtp'],
            ];

            Config::set('mail', $config);

            $from = [
                'address' => $smtpConfig['email_smtp'],
                'name'  =>  "Cutrico"

            ];

            Config::set('mail.from', $from);

           // return response()->json(['message' => 'SMTP parameters updated']);
        }




        return $next($request);
    }
}
