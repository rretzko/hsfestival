<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Useroption;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.options.index', [
            'options' => Option::all(),
            'useroptions' => Useroption::where('user_id', auth()->id())->get(),
        ]);
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
     * "venue" => "0"
     * "permissions" => "0"
     * "confirmation_1" => "1"
     * "confirmation_2" => "1"
     * "plaque_or_certificate" => "0"
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->validate([
            'venue' => ['required','numeric'],
            'permissions' => ['required', 'numeric'],
            'confirmation_1' => ['required', 'numeric'],
            'confirmation_2' => ['required', 'numeric'],
            'plaque_or_certificate' => ['required','numeric'],
        ]);

        foreach($input AS $key => $value){

            Useroption::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'option_id' => Option::where('descr', $key)->first()->id,
                ],
                [
                    'value' => $value,
                ],
            );
        }

        return $this->index();
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
