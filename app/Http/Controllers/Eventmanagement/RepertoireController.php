<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepertoireRequest;
use App\Models\Ensemble;
use App\Models\Ensembletype;
use App\Models\Repertoire;
use App\Models\User;
use App\Traits\DurationTrait;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    use DurationTrait;

    public function edit(Repertoire $repertoire, User $user)
    {
        return view('eventmanagement.repertoire.edit',
            [
                'durations' => $this->duration(),
                'ensemble' => Ensemble::find($repertoire->ensemble->id),
                'ensembletypes' => Ensembletype::all(),
                'repertoire' => $repertoire,
                'user' => $user,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(RepertoireRequest $request, Repertoire $repertoire, User $user)
    {
        $repertoire->update($request->all());

        return redirect()->route('eventmanagement.registrant.edit', ['user' => $user] );
    }

    public function destroy(Repertoire $repertoire, User $user)
    {
        $repertoire->delete();

        return redirect()->route('eventmanagement.registrant.edit', ['user' => $user] );
    }
}
