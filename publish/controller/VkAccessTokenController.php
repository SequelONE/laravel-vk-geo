<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ATehnix\VkClient\Auth;

class VkAccessTokenController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vkaccesstoken(Request $request)
    {
        $auth = new Auth(env('VKONTAKTE_KEY', ''), env('VKONTAKTE_SECRET', ''), env('VKONTAKTE_REDIRECT_URI', ''));

        if(isset($request->code)) {
            $code = $auth->getToken($request->code);
        } else {
            $code = '';
        }
        
        return view('vkaccesstoken', [
            'auth' => $auth,
            'access_token' => $code
        ]);
    }
    
}