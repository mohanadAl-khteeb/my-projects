<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        $userid = auth()->user()->id;
        $data = request()->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'password' => ['nullable','confirmed','min:8'],
            'image' => ['mimes:jpeg,png,jpg']
        ]);
        if(request()->has('password')){
            $data['password'] = Hash::make(request('password'));
        }
        if(request()->hasFile('image')){
            $path = request('image')->store('users' ,'public');
            $data['image']=$path;
        }
        User::findOrFail($userid)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
