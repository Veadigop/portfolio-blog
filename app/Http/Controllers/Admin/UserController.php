<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id')->paginate(5);
        return view('admin.users.users', ['users'=>$users]);
    }

    public function usersAdd(Request $request)
    {
        if($request->isMethod('post')){

            $validator = Validator::make($request->all(),[
                'name' => 'required|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' =>'required|max:255',
                'role' => 'required'
            ]);

            if($validator->fails()){
                return redirect('/admin/user/add')
                    ->withInput()
                    ->withErrors($validator);
            }

            $new_user = new User;

            $new_user -> save([
                $new_user -> name = $request -> name,
                $new_user -> email = $request -> email,
                $new_user -> role = $request -> role,
                $new_user -> password = Hash::make($request -> password)
            ]);


            Session::flash('user_add', 'New user aded');
            return redirect('/admin/user/add');
        }

        return view('admin.users.add-user');
    }

}