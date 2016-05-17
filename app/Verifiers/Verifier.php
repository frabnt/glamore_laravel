<?php 
namespace App\Verifiers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Verifier
{
    public function verify($email, $password)
    {
        $credentials = [
          'email'     => $email,
          'password' => $password,
        ];
        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }
        return false;
    }
}