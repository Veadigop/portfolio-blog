<?php


namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $users = User::orderBy('id')->paginate(5);
        return view('admin.users.index',   compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show',   compact('user'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit',   compact('user','roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|max:255',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('message_success','New user ' . $user->name . ' was added');

        return back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|max:255',
            'email' => 'nullable|string|email|max:255',
        ]);

        $user_id = request('user_id');
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->role_id)){
            $user->role_id = $request->role_id;
        }
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        session()->flash('message_success','User ' . $user->name . ' was updated');

        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $user = User::find(request('user_id'));
            $user_name = $user->name;
            $user->delete();
            $response = 'User ' . $user_name . ' was deleted!';
            return response(array('success' => "true", 'response'=>$response), 200);

        }

        $user = User::find(request('user_id'));
        $user_name = $user->name;
        $user->delete();

        session()->flash('message_alert','User "' . $user_name . '" was deleted.');
    }


}