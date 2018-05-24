<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CommitteeList;
use Auth;
use Storage;
class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
      $user = User::find(Auth::user()->id);
      if ($request->photo) {
        $path = Storage::disk('public')->put('avatars', $request['photo']);
      }else{
        $path = $user->photo;
      }
      $user->name = $request->name;
      $user->email = $request->email;
      $user->gender = $request->gender;
      $user->birthday = $request->birthday;
      $user->phone = $request->phone;
      $user->address = $request->address;
      $user->photo = $path;
      $user->save();
      return redirect(route('profile'));
    }

    public function updateSecurity(Request $request)
    {
      $user = User::find(Auth::user()->id);
      if (password_verify($request->password_old, $user->password)) {
        $user->password = bcrypt($request->password_new);
        $user->save();
      }else{
        return "Old password wrong, back to profile page";
      }
      return redirect(route('profile'));
    }

    public function all()
    {
      return view('user.index',[
        'users' => CommitteeList::all()
      ]);
    }

    public function changeCommittee(User $user)
    {
      $user->role = 'Committee';
      $user->save();
      CommitteeList::where('user_id', $user->id)->delete();
      return redirect(route('users'));
    }

    public function beCommittee(User $user)
    {
      $check = CommitteeList::where('user_id', $user->id)->get();
      if (count($check) == 0) {
        CommitteeList::create([
          'user_id' => $user->id
        ]);
      }
      return redirect(route('profile'));
    }
}
