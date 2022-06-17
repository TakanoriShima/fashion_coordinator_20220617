<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
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
        
        $profile = new Profile();
        if(\Auth::user()->role === 1){
            return view('profiles.create', compact('profile'));
        }else{
            return view('profiles.create_user', compact('profile'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        if(\Auth::user()->role === 1){
             $this->validate($request, [
                'nickname' => 'required',
                'birthday' => 'required',
                'height' => 'required',
                'style' => 'required',
                'comment' => 'required',
            ]);
            
            $nickname = $request->input('nickname');
            $birthday = $request->input('birthday');
            $height = $request->input('height');
            $style = $request->input('style');
            $comment = $request->input('comment');
            
            $profile = \Auth::user()->profile()->create(compact('nickname', 'birthday', 'height', 'style', 'comment'));
        
            
        }else{
             $this->validate($request, [
                'nickname' => 'required',
                'birthday' => 'required',
                'height' => 'required',
                'phone' => 'required',
                'comment' => 'required',
            ]);
            
            $nickname = $request->input('nickname');
            $birthday = $request->input('birthday');
            $height = $request->input('height');
            $phone = $request->input('phone');
            $comment = $request->input('comment');
            
            $profile = \Auth::user()->profile()->create(compact('nickname', 'birthday', 'height', 'phone', 'comment'));
        }
       
        return redirect('/top');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
