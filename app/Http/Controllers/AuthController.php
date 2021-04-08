<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use  Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            // $this->validate($request, [

            //     'email' => 'required|email',
            //     'password' => 'required',

            // ]);

            $aa = md5($request->password);

        //    return $request->all();
        // return $aa;
            $e = GeneralSettings::where('userName',$request->username)
                ->where('password', $aa)
                ->get();
                // return $e;
            if ($e == '[]') {
                $request->session()->flush();

                return response()->json(['message' => "Check your login credentials", 'statuscode' => '201']);
            }
            else {
                // return $e;
                $request->session()->push('EmppId', $e[0]->id);
                return response()->json(['statuscode' => '200']);

                // return route('/admin/view');
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
            return redirect('/login');

        } catch (\Throwable $th) {
            //return $th;
            Session::flash('msg', "Error Occured with the page");
            Session::save();
            return view('login');

        }
    }
}
