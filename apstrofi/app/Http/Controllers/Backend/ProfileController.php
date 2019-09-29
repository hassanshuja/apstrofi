<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

class ProfileController extends Controller{


    public function index()
    {
        return view('backend.profile.index', ['page_title' => 'Profile']);
    }

    public function changePassword(){

        $data = request()->all();
        $this->validate(request(),[
            'old_password'=>'required|current_password',
            'new_password'=>'required|different:old_password',
            'confirm_password'=>'required|same:new_password',
        ],[
            'old_password.current_password'=>'Invalid Old Password'
        ]);

        auth()->guard('admin')->user()->password = bcrypt($data['new_password']);
        auth()->guard('admin')->user()->save();

        return response()->json(['status'=>true,'message'=>'Password Updated Successfully.']);

    }

    public function changeProfilePic(){
        $data = request()->all();
        //get the base-64 from data
        $base64_str = substr($data['base64_image'], strpos($data['base64_image'], ",")+1);
        //decode base64 string
        $image = base64_decode($base64_str);
        $safeName = str_random(10).'.'.'png';
        $path= 'images/admin/'.auth()->guard('admin')->user()->id.'/'.$safeName;
        \Storage::put($path, $image);
        auth()->guard('admin')->user()->image_url ='storage/'.$path;
        auth()->guard('admin')->user()->save();
        return response()->json(['path'=>auth()->guard('admin')->user()->image_url]);
    }

    public function changeUserInfo(){
        $request = request();
        $user = auth()->guard('admin')->user();
        $rules = [
            'name'  => 'required',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$user->id.',id'
        ];
        $this->validate($request, $rules);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return response()->json(compact('user'));
    }
}