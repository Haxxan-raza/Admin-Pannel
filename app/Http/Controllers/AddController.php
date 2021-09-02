<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Age;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\SocialMedia\Google;
// use Illuminate\Database\Eloquent\Model;
use Auth;

class AddController extends Controller
{
//show view cityadd

function show( Google $goo)
{
// $goo->getGoogleCred(config('services.google'));
//     dd($goo);
    return view('cityadd');
  
}
//Registration Form view
public function registerForm()
{
    $img=User::with('user')->first();
    $cities=City::all('city_name', 'id');
    $agegroups=Age::all('agegroup' , 'id');
    return view('register',compact(['cities','agegroups','img']));
} 


// Age Group  view
public function showAge()
{
return view('agegroup');
} 
  //view For Profile Record Display
public function recordDisply()
{
    $profiles=Profile::all();
    return view('userdisplay', compact('profiles'));
}
//add City in Database
    function citystore(Request $request)
    {
        City::create([
            'user_id'   => Auth::user()->id,
            'city_name' => $request->city_name
        ]);

        return redirect('addcity');
          
    }
    
    // Add Age Group in Database
    function ageStore(Request $request)
    { 
         Age::create([
            'user_id'   => Auth::user()->id,
            'agegroup'  => $request->agegroup
           ]);
           return redirect('addages');
    }
   
   //Save Profile and Description in Database
    function saveProfile(Request $request)
    {   
       if($request->hasfile('profile'))
       {
           $file= $request->file('profile');
           $extension =$file-> getClientOriginalExtension();
           $filename= time().'.'.$extension;
           $file->move(public_path('profileImages'), $filename);
       }
      
          Profile::create([
        'user_id'      => Auth::user()->id,
        'profile'      => $filename,
        'descripition' => $request->descripition,
        'city_name'    => $request->city_name,
        'agegroup'     => $request->agegroup
    ]);
    return redirect('registerform');
}
// open edit folder in database table
public function editProfile($id)
{
    $allprofiles=Profile::find($id);
    $cities=City::all('city_name', 'id');
    $agegroups=Age::all('agegroup' , 'id');
    return view('editprofile',compact(['cities','agegroups','allprofiles']));
}

//update data in Profile
public function updateProfile(Request $request ,$id)
{
    if($request->hasfile('profile'))
       {
        $file = request()->file('profile') ? request()->file('profile'): null;
           $extension =$file-> getClientOriginalExtension();
           $filename= time().'.'.$extension;
           $file->move(public_path('profileImages'), $filename);
       }
          Profile::where('id', $id)->update([
        'user_id'      => Auth::user()->id,
        'profile'      => $filename,
        'descripition' => $request->descripition,
        'city_name'    => $request->city_name,
        'agegroup'     => $request->agegroup
    ]);
    return redirect('recorddisply')->with('status','profileData updated Successfully');;
}

//delete data form database
    public function destroy($id)
{
    // dd($id);
    $deleteprofiles = Profile::findOrFail($id);
    $image_path = public_path("profileImages/{$deleteprofiles->profile}");

    if (File::exists($image_path)) {
        //File::delete($image_path);
        File::delete( $image_path);
    }
        $deleteprofiles->delete();
        return redirect()->back()->with('status','profileData Deleted Successfully');
}
public function logout(Request $request) {
    Auth::logout();
    return redirect('/login');
  }
   
       
}
