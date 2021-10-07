<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dragonball;
use DB;

class DragonballController extends Controller
{
    
    public function getAll() {
        $ball = Dragonball::all();
        return response($ball, 200);
      }

    public function getRanking() {
        $ball = DB::table('Dragonballs')
        ->orderBy('power','desc')
        ->get();
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

      public function destruir($id)
      {
          $product = Dragonball::find($id);
          $product->delete();
 
          return response()->json('Product successfully deleted!');
      }

      public function actualizar(Request $request, $id)
      {

        /*
        if (Book::where('id', $id)->exists()) {
          $book = Book::find($id);
          $book->name = is_null($request->name) ? $book->name : $book->name;
          $book->author = is_null($request->author) ? $book->author : $book->author;
          $book->save();
        */
          $product = Dragonball::find($id);
          //$product->update($request->all());
         $product->name = $request->name;
         $product->atamin = $request->atamin;
         $product->atamax = $request->atamax;
         // No es necesario especificar el power en el Postman porque no es un request, este se opera en la misma función
         $product->power = (($product->atamin + $product->atamax)/2);
         $product->save(); 

          return response()->json([
              'status' => 'success',
              'post'   => $product
          ]);
      }

      public function show($id)
      {
          $product = Dragonball::find($id);
          return response()->json($product);
      }

      public function onethousandpower() {
          $ball = Dragonball::where('power','>=','1000')->get();
          //$ball = Dragonball::all();
          return response($ball, 200);
      }


}
