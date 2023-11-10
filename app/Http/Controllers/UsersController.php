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
            ->get();
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

        $roles = Role::all();
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
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);

        User::create([
            'name' => $data['name'],
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'roleID' => $data['role_id'],
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'roleID' => 'required|exists:roles,id',
            'email' => 'required'
        ]);

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);


        return redirect()->route('users.index')
            ->with('success', 'User updated Successfully');
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
