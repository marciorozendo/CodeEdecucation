<?php
/**
 * Created by PhpStorm.
 * User: Sezefredo
 * Date: 20/02/2016
 * Time: 23:43
 */

namespace CodeEducation\OAuth;


use Illuminate\Support\Facades\Auth;

class Verifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}