<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use App\role_user;
use Illuminate\Http\Request;
use DB;
// use APp\Http\Controllers\User;

class RegisterTravelController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.registertravel');
    }

  
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

  
        {
        
            $user = new User;
            $user->name= $request->name;
            $user->email= $request->email;
            $user->password= Hash::make($request->newPassword);
            $user->save();

            $role_user = new role_user;
            $role_user->user_id = $user->id;
            $role_user->role_id = '3';
            $role_user->save();
            return redirect('home');
          
            // DB::table('users') -> insert([
            //     'name'  => $request -> name,
            //     'email' => $request -> email,
            //     'password'  => Hash::make($request->newPassword)
            // ]);

            // DB::table('role_users')->insert ([
            //     'user_id'   => $user->id,
            //     'role_id'   => '3'
            // ]);

        }
    }


    
    
}
