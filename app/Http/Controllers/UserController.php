<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(decrypt($id));
        return view('profile.show')->with('details',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(decrypt($id));
        return view('profile.edit')->with('details', $user);
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
        $data = $request->validate([
            'name'    => ['nullable', 'string', 'max:255'],
            'email'   => ['nullable', 'string', 'email', 'max:255', "unique:users,email,$id"],
            'birth'   => ['nullable', 'string'],
            'city'    => ['nullable', 'string', 'max:50'],
            'country' => ['nullable', 'string', 'max:50'],
            ]);

        if($data)
        {
            $user = User::find(decrypt($id));
            if($data['name'] == NULL)
                $data['name'] = $user->name;
            if($data['email'] == NULL)
                $data['email'] = $user->email;
            if($data['city'] == NULL)
                $data['city'] = $user->city;
            if($data['country'] == NULL)
                $data['country'] = $user->country;
            if($data['birth'] == NULL)
                $data['birth'] = $user->birth;
            else
                $data['birth'] = $data['birth'];
            // date("Y-m-d", strtotime($data['birth']));

            $details = User::where('id',decrypt($id))->update([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'city'          => $data['city'],
                'country'       => $data['country'],
                'birth'         => $data['birth']
            ]);
            if($details)
                return back()->withSuccess('User Details Edited Successfully.');
            else
                return back()->withErrors('Error Editing User Details.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find(decrypt($id))->delete();
        if($delete)
        {
            Auth::logout(decrypt($id));
            return redirect('register')->withSuccess('User Account Deleted.');
        }
        else
            return back()->withErrors('Error Deleting Account');
    }

    public function changePass($id)
    {
        return view('profile.changepass')->with('pass', $id);
    }

    public function updatePass(Request $request, $id)
    {
        $data = $request->validate([
            'current_password'  => ['required', 'string', 'min:8'],
            'new_password'      => ['required', 'string', 'min:8'],
        ]);
        $user = User::find(decrypt($id));
        if(Hash::check($data['current_password'], $user->password))
        {
            $profile = User::where('id',decrypt($id))->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
            if($profile)
                return back()->withSuccess('Password Change Successfully');
            else
                return back()->withErrors('Error Changing Password');
        }
        else
            return back()->withErrors('Current Password invalid.');
    }

}
