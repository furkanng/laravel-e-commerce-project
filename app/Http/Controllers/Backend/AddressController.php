<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users/{}/addresses";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $addrs = $user->addrs;
        return view("backend.addresses.index", ["addrs" => $addrs, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("backend.addresses.insert_form", ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user, AddressRequest $request): \Illuminate\Http\RedirectResponse
    {
        $is_default = $request->get("is_default", 0);

        $addr = new Address();
        $addr->city = $request->city;
        $addr->district = $request->district;
        $addr->zipcode = $request->zipcode;
        $addr->address = $request->address;
        $addr->user_id = $request->user_id;
        $addr->address_id = $request->address_id;
        $addr->is_default = $is_default;

        $addr->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);

//        $addr = new Address();
//        $is_default = $is_default == "on" ? 1 : 0;
//        $data = $this->prepare($request, $addr->getFillable());
//
//        $addr->fill($data);
//        $addr->save();

//        $this->editReturnUrl($user->user_id);
//
//        return Redirect::to($this->returnUrl);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user, Address $address): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view("backend.addresses.update_form", ["user" => $user, "addr" => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressRequest $request, User $user, Address $address): \Illuminate\Http\RedirectResponse
    {
        $is_default = $request->get("is_default");
        $is_default = $is_default == "on" ? 1 : 0;


        $address->city = $request->city;
        $address->district = $request->district;
        $address->zipcode = $request->zipcode;
        $address->address = $request->address;
        $address->user_id = $request->user_id;
        $address->address_id = $request->address_id;
        $address->is_default = $is_default;

        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user, Address $address): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $address->delete();

        return redirect()->back();
    }


    private function editReturnUrl($id)
    {
        $this->returnUrl = "/users/$id/addresses";
    }
}
