<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\level;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('admin.account_management', [
            "title" => "Account Management",
            "post" => User::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('crud.edit_account', [
            "title" => "Add Account",
            'levels' => level::all(),
            'post' => $user,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
       $rules =[
                'name' => 'required|min:4',
               
                
               

            ];
        if ($request->user_name != $user->user_name) {
            $rules['user_name'] = 'required|unique:users|min:4';
        } 
        if($request->password != '')
        {
            $rules['password'] = 'max:35|min:6';

        }  

        if ($request->email != $user->email) {
    $rules['email'] = ['required','max:35','min:9','email:dns','unique:users'];
}


        $validateData = $request->validate($rules);
          if($request->password != '')
        {
            $validateData['password'] = bcrypt($request['password']);
        //   return $validateData;

        }

        User::where('id', $user->id)->update($validateData);

        return redirect('/account')->with('success', 'Account Has Been Change');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       user::destroy($user->id);
return redirect('/account')->with('success', 'Account Has Been Delete');

    }
}
