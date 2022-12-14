<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Flash;
use Response;
use PDF;

class AdviserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(Request $request){

        $user = User::whereNotNull('approved_at')->paginate(4);    
        return view('admin.adviser.index', compact('user'));

        // $paginate = User::paginate('4');
    }

   public function show($id)
   {
       $user = User::find($id);

       if (empty($user)) {
           Flash::error('Advisers not found');

           return redirect(route('users.index'));
       }

       return view('admin.adviser.show')->with('user', $user);
   }

   public function edit($id){
    $user = User::find($id);
    return view('admin.adviser.edit', compact('user'));
}


public function update(Request $request, $id){

    $user = User::find($id);
    $user->contact_no = $request->input('contact_no');
    $user->name = $request->input('name');
    $user->advisory = $request->input('advisory');
    $user->email = $request->input('email');
 
   
    if($request->hasFile('avatar')){

      $destination = 'images/avatars/'.$user->avatar;
    //   if(File::exists($destination)){
    //      File::delete($destination);
    //   }
      $file = $request->file('avatar');
      $extention = $file->getClientOriginalExtension();
      $filename = time().'.'. $extention;
      $file->move('images/avatars/', $filename);
      $user->avatar = $filename;
    
    }

    $user->update();
    return redirect()->back()->with('status', 'Adviser Updated Successfully!');
  
 }

   public function destroy($id){
    $user = User::find($id);
    $destination = 'images/avatars/'.$user->avatar;
    //  if(File::exists($destination)){
    //      File::delete($destination);
    //  }
    $user->delete();
    return redirect()->back()->with('status', 'Adviser Removed Successfully!');

    }

    public function export_user_pdf(){
        $user = User::whereNotNull('approved_at')->get();
        $pdf = PDF::loadVIew('pdf.users', [
            'users' => $user
        ]);
        return $pdf->download('users.pdf');
    }
    
}
