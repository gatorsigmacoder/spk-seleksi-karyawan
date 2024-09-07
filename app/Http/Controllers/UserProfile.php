<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfile extends Controller
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
    public function show(User $user_profile)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user_profile)
    {
        return view('user-profile.index',[
            'user_data' => $user_profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user_profile)
    {
        if(auth()->user()->id != $user_profile->id){
            return back()->with('toast_error', 'Jangan edit punya orang ya!');
        }

        if($request->username === $user_profile->username){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:5|max:255'
            ]);
        }else{
            $validated = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|min:5|max:255|unique:users'
            ]);
        }

        User::where('id', auth()->user()->id)->update($validated);
        return back()->withToastSuccess('Berhasil edit profile');
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
    }
}
