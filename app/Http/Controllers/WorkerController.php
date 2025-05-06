<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Travel;
use App\Models\Type;
use App\Models\Worker;

class WorkerController extends Controller
{
    


    function show(){

    $workers=Worker::all();

    return view ('showWorkers', compact('workers'));


    }
    


    function create(){

        $workers=Worker::all();

        return view ('createWorker');


    }




    function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $worker = new Worker();
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        
        $worker->save();
    
        
        return redirect()->route('showWorkers')->with('success', 'Creado con éxito');




    }



    function modify($id){

        $worker = Worker::findOrFail($id);

        return view ('editWorker', compact('worker'));


    }




    function edit(Request $request, $id){

        $worker = Worker::findOrFail($id);
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        $worker->save();
    
    
        
        return redirect()->route('editWorker', $id)->with('success', 'Creado con éxito');

    }












}
