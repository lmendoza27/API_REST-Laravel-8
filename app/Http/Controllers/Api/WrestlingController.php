<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wrestling;

class WrestlingController extends Controller
{
    
    public function create(Request $request) {
        $book = new Wrestling;
        $book->name = $request->name;
        $book->power = $request->power;
        //$book->image = $request->file('image')->store('Wrestling');
        //$book->image = $request->file('image')->store('public/Wrestling');
        $book->image = $request->file('image')->store('Wrestling', 'public');
        $book->company = $request->company;
        $book->save();
  
        return response()->json([
          "message" => "Wrestler Creado Correctamente"
        ], 201);
      }
          
    public function getAll() {
        $ball = Wrestling::all();
        return response($ball, 200);
      }
}
