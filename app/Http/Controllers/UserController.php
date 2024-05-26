<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $name = strtolower($name);
        $users = User::whereRaw('LOWER(first_name) LIKE ? OR LOWER(last_name) LIKE ? OR CONCAT(LOWER(first_name), " ", LOWER(last_name)) LIKE ?', ["{$name}%", "{$name}%", "{$name}%"])
                ->orderBy('first_name', 'asc')
                ->orderBy('last_name', 'asc')
                ->get();        
                
        if (! isset($users)) {
            return 'No results';
        };

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $files = File::where('user_id', $id)->get();

        

        return view('users.show', compact('user', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
