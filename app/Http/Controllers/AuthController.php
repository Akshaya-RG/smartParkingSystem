<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $this->validate($request, [

                'email' => 'required|email',
                'password' => 'required',

            ]);

            $aa = md5($request->password);
            $e = GeneralSettings::where('userName', $request->email)
                ->where('password', $aa)
                ->get();
            if ($e == '[]') {
                $request->session()->flush();
                return response()->json(['message' => "Check your login credentials", 'statuscode' => '201']);
            }
            else {

                return view('/admin');
            }
        } catch (\Throwable $th) {
            return $th;

           // return response()->json(['message' => "Internal Server Error", 'statuscode' => '500']);
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->session()->flush();
            return redirect('/');

        } catch (\Throwable $th) {
            Session::flash('msg', "Error Occured with the page");
            Session::save();
            return view('sample');

        }
    }
}
