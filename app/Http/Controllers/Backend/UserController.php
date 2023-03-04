<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        //Get işlemi
        $name = $request->get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        $is_admin = $request->get("is_admin", 0);
        $is_active = $request->get("is_active", 0);

        //Checkbox işlemleri için
        $is_admin = $is_admin == "on" ? 1 : 0;
        $is_active = $is_active == "on" ? 1 : 0;

        //Yeni kullanıcı oluşturma
        $user = new User();

        //Set işlemi
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();

        return Redirect::to($this->returnUrl);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("backend.users.update_form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $users = User::all();
        $user = $users->find($id);

        $name = $request->get("name");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin");
        $is_active = $request->get("is_active");

        $is_admin = $is_admin == "on" ? 1 : 0;
        $is_active = $is_active == "on" ? 1 : 0;

        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;

        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for changing password.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function passwordForm(User $user)
    {
        return view("backend.users.password_form", ["user" => $user]);
    }

    public function changePassword(User $user, UserRequest $request)
    {
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
