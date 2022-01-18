<?php

namespace App\Http\Controllers;

use App\Models\fichasgenericas;
use App\Models\Fichashitodama;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == 'admin') {
                $fichashitodama = Fichashitodama::all()->sortByDesc('user_id');
                $fichasgenerica = fichasgenericas::all();

                $users = User::all();

                return view('sheets.dashboard', [
                    'fichashitodama' => $fichashitodama,
                    'fichasgenerica' => $fichasgenerica,
                    'users' => $users
                ]);
            } else {
                $fichashitodama = User::where('id', Auth::id())->first()->fichashitodama()->get();
                $fichasgenerica = User::where('id', Auth::id())->first()->fichasgenerica()->get();

                return view('sheets.dashboard', [
                    'fichashitodama' => $fichashitodama,
                    'fichasgenerica' => $fichasgenerica,
                ]);
            }
        }

        return redirect()->route('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $login['success'] = true;
            return json_encode($login);
        }

        $login['success'] = false;
        $login['message'] = 'Os dados informados não conferem!';
        return json_encode($login);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.index');
    }
}
