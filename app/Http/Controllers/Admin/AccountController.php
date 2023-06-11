<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view("admin.account.index", ["user" => $user]);
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
    public function update(AccountUpdateRequest $request)
    {
        $user = auth()->user();
        $validated = $request->validated();

        if (Hash::check($request->password, $user->password)){
            $user->update($validated);

            if($request->new_password != $user->password) //cambio password
                $user->password = Hash::make($request->new_password);

            $user->save();

            return back()->with("mex", "L'account è stato modificato con successo!");
        }
        else{
            return back()->with("error", "La password inserita non è corretta");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $user = auth()->user();

        if (Hash::check($request->password, $user->password)){
            $user = auth()->user();

            Auth::guard('web')->logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            if($user->profile_image != null)
                Storage::delete($user->profile_image);
        
            $user->delete();
        
            return redirect('/');
        }
        else
            return back()->with("errorDelete", "La password inserita non è corretta. Impossibile cancellare l'account");

    }
}