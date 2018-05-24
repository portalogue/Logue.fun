<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\CommitteeList;
use Auth;
use Storage;
use DB;
use Validator;
class UserController extends Controller
{

    public $successStatus = 200;
    private $client;

    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 1)->first();
    }

    public function login(){
      // return Auth::attempt(['email' => request('email'), 'password' => request('password')]) ? 'yes' : 'no';
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6',
          'gender' => 'required|string',
          'birthday' => 'required|date',
          'phone' => 'required',
          'address' => 'required|string',
          'photo' => 'nullable|image'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $request['email'],
            'password'      => $request['password'],
            'scope'         => null,
        ]);

        // Fire off the internal request.
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return \Route::dispatch($proxy);

    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

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
      return response()->json($user);
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
      return response()->json('success');
    }

    public function all()
    {
      return response()->json(CommitteeList::with('user')->get());
    }

    public function changeCommittee(User $user)
    {
      $user->role = 'Committee';
      $user->save();
      CommitteeList::where('user_id', $user->id)->delete();
      return response()->json($user);
    }

    public function beCommittee(User $user)
    {
      $check = CommitteeList::where('user_id', $user->id)->get();
      if (count($check) == 0) {
        CommitteeList::create([
          'user_id' => $user->id
        ]);
      }
      return response()->json($user);
    }
}
