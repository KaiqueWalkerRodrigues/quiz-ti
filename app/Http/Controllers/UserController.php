<?php

namespace App\Http\Controllers;

use App\Models\{User,Avatar};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $user = User::orderbydesc('points')->limit(10)->get();
        return view('user.index')
            ->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = null;
        return view('user.register')
            ->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();

        return redirect()
            ->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = User::find($id);
        $avatar = Avatar::find($user->id_avatar);
        return view('user.show')
            ->with(compact('user','avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::find($id);
        return view('user.form')
            ->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect()
            ->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();
        $user->save();
        return redirect()
            ->back();
    }

    //leva para pagina de editar o avatar do usuario
    public function editavatar(int $id)
    {
        $user = User::find($id);
        $avatares = Avatar::all();
        return view('user.avatar')
            ->with(compact('user','avatares'));
    }

    //recebe as informações e edita o avatar do usuario
    public function updateavatar(request $request, int $id)
    {
        $user = User::find($id);
        $user->id_avatar = $request->id_avatar;
        $user->save();
        return redirect()   
            ->route('user.show',['id'=>Auth::user()->id]);
    }

}
