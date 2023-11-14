<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = DB::table('users')
            ->select('users.id', 'name', 'email', 'users.created_at', 'roles.roleName')
            ->leftJoin('roles', 'users.roleID', '=', 'roles.id')
            // ->get()
            ->paginate(5);
        return view('users.index', compact('users'));
    }

    use RegistersUsers;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all()->paginate(5);
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate($request, [
            // 'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roleID' => ['required']
        ]);

        User::create([
            'name' => $data['firstName'] . ' ' . $data['lastName'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'roleID' => $data['roleID'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('users')->with('success', 'Successfully added a  user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();

        return view('users.edit', compact('users', 'roles'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @param  int  $id
     * @return \App\Models\User
     */
    protected function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|no_only_spaces',
            'email' => 'required|email',
            'roleID' => 'required|exists:roles,id'
        ]);

        $user = User::findOrFail($id);

        if (!is_null($user)) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->roleID = $request['roleID'];
            $user->save();
        }
        
        return redirect('users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $id =  User::find($id)->delete();

        return redirect('users')->with('success', 'User has been deleted Successfully');
    }
    public function viewRoles()
    {
        $data = Role::all();
        return view('users.view_roles', compact('data'));
    }

    public function createRoles()
    {
        return view('users.create_roles');
    }

    public function storeRoles(Request $request)
    {
        $validator = $this->validate($request, [
            'roleName' => ['required']

        ]);

        Role::create($validator);
        return redirect('viewRoles')->with('success', 'Successfully created a role');
    }
}
