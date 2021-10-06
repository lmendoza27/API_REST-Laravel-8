<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dragonball;

class DragonballController extends Controller
{
    
    public function getAll() {
        $ball = Dragonball::all();
        return response($ball, 200);
      }
      public function createCharacter(Request $request) {
        $book = new Dragonball;
        $book->name = $request->name;
        $book->atamin = $request->atamin;
        $book->atamax = $request->atamax;
        // No es necesario especificar el power en el Postman porque no es un request, este se opera en la misma función
        $book->power = (($book->atamin + $book->atamax)/2);
        $book->save();
  
        return response()->json([
          "message" => "Personaje creado Correctamente"
        ], 201);
      }
}
