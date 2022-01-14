<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs = $request->validate(
            [
                'schoolname' => ['required', 'string', 'min:12', 'max:160'],
                'address1' => ['nullable', 'string', 'max:160'],
                'address2' => ['nullable', 'string', 'max:160'],
                'city' => ['nullable', 'string', 'max:160'],
                'stateabbr' => ['required', 'string', 'max:2'],
                'postal_code' => ['nullable', 'string', 'max:24'],
            ]
        );

        School::updateOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'name' => $inputs['schoolname'],
                'address_1' => $inputs['address1'],
                'address_2' => $inputs['address2'],
                'city' => $inputs['city'],
                'state_abbr' => $inputs['stateabbr'],
                'postal_code' => $inputs['postal_code'],
            ]
        );

        return view('users.profile.show');
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
