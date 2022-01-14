<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\Phonetype;
use Illuminate\Http\Request;

class PhoneController extends Controller
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
                'phonecell' => ['required', 'string', 'min:10','max:24'],
                'phonework' => [ 'nullable', 'string', 'max:24'],
                'phonehome' => [ 'nullable', 'string', 'max:24'],
            ]
        );

        //mobile phone (REQUIRED)
        Phone::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'phonetype_id' => Phonetype::MOBILE,
            ],
            [
                'phone' => Phone::formatString($inputs['phonecell'])
            ]
        );

        //work phone
        if(! is_null($inputs['phonework'])){

            Phone::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'phonetype_id' => Phonetype::WORK,
                ],
                [
                    'phone' => Phone::formatString($inputs['phonework'])
                ]
            );

        }else{ //delete current value if exists

            if(Phone::where('user_id', auth()->id())->where('phonetype_id', Phonetype::WORK)->exists()){

                Phone::where('user_id', auth()->id())->where('phonetype_id', Phonetype::WORK)->delete();
            }
        }

        //home phone
        if(! is_null($inputs['phonehome'])){

            Phone::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'phonetype_id' => Phonetype::HOME,
                ],
                [
                    'phone' => Phone::formatString($inputs['phonehome'])
                ]
            );

        }else{ //delete current value if exists

            if(Phone::where('user_id', auth()->id())->where('phonetype_id', Phonetype::HOME)->exists()){

                Phone::where('user_id', auth()->id())->where('phonetype_id', Phonetype::HOME)->delete();
            }
        }

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
