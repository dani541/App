<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Travel;
use App\Models\Type;
use App\Models\Worker;

class Travel extends Model
{
    //


    protected $fillable= ['id', 'origin', 'departDate', 'returnDate', 'price', 'workers', 'type'];


    function workers(){

        return $this->belongsToMany(Worker::class);
    }


    function type(){


        return $this->belongsTo(Type::class);


    }


}
