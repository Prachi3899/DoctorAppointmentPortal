<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class Appointmentcontoller extends Controller
{
    //
    public function save(Request $request){
        $patient = new Appointment([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'timing'=>$request->get('timing')
        ]);
        $patient->save();

        return redirect ()->back();
    }
}
