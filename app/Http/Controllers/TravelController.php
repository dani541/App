<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Type;
use App\Models\Worker;

class TravelController extends Controller
{
    

    function create(){

        $travels=Travel::all();

        $workers=Worker::all();

       $types=Type::all();

        return view ('home', compact('travels','types','workers'));


    }


    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            'departDate' => 'required|date',
            'returnDate' => 'required|date',
            'price' => 'required|numeric',
            'type_id' => 'required|exists:types,id',
            'workers' => 'required|array',
            'workers.*' => 'exists:workers,id',
        ]);
    
        // Separamos los workers
        $workerIds = $validated['workers'];
        unset($validated['workers']); // quitamos 'workers' antes del create
    
        // Creamos el viaje sin 'workers'
        $travel = Travel::create($validated);
    
        // Adjuntamos los workers al viaje
        $travel->workers()->attach($workerIds);
    
        return redirect()->route('home')->with('success', 'Viaje creado correctamente');
    }


/*
    function store(Request $request){

        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'departDate' => 'required',
            'returnDate' => 'required',
            'price' => 'required',
            'type_id'=>'required'
        ]);

        $travel = new Travel();
        $travel->origin = $request->origin;
        $travel->destination= $request->destination;
        $travel->departDate= $request->departDate;
        $travel->returnDate = $request->returnDate;
        $travel->price = $request->price;
        $travel->type=$request->type;
        
        $travel->save();
    
        $travel->workers()->attach($request->workers);
      
        
        return redirect()->route('')->with('success', 'Creado con éxito');




    }

*/


    function modify($id){

        $travel = Travel::findOrFail($id);

        return view ('editTravel', compact('travel'));


    }




    function edit(Request $request, $id){

        $travel = Travel::findOrFail($id);
        $travel->origin = $request->origin;
        $travel->destination = $request->destination;
        $travel->departDate= $request->departDate;
        $travel->returnDate= $request->returnDate;
        $travel->price= $request->price;



        $travel->save();
    
    
        
       // return redirect()->route('editTravel', $id)->with('success', 'Creado con éxito');

       return redirect()->route('home')->with('success', 'Creado con éxito');


    }




    function delete($id){


     
    $travel = Travel::find($id);


    if (!$travel) {
        return redirect()->route('home')->with('error', 'El viaje no existe.');
    }


    $travel->delete();

 
    return redirect()->route('storeTravel')->with('success', 'Viaje eliminado con éxito.');

    }



    function playground(Request $request){

        $query = Travel::with(['workers', 'type']);

       
        if ($request->has('minWorkers')) {
            $query = $query->has('workers', '>', $request->minWorkers);
        }
    
       
        if ($request->has('minPrice')) {
            $query = $query->where('price', '>=', $request->minPrice);
        }
    
    
        if ($request->has('maxPrice')) {
            $query = $query->where('price', '<=', $request->maxPrice);
        }
    
       
        $travels = $query->get();
    
        return view('playground', compact('travels'));







    }








}
