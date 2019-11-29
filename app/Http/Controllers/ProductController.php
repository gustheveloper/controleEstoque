<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Product;

use Auth;

class ProductController extends Controller
{
    public function create(Request $request)
    {
      $newProduct = new product();
      $newProduct->name = $request->productName;
      $newProduct->description = $request->productDescription;
      $newProduct->quantity = $request->productQuantity;
      $newProduct->price = $request->productPrice;
      $newProduct->user_id = Auth::user()->id;

      $result = $newProduct->save();
      return view('products.form', ['result'=>$result]);
    }


    public function viewForm(Request $request)
    {
      return view('products.form');
    }

    public function update(Request $value)
    {
      // O parametro vai ser um ID do produto, buscar um objeto ao invés de buscar.
      $newProduct = product::find();
      $newProduct->name = $request->productName;
      $newProduct->description = $request->productDescription;
      $newProduct->quantity = $request->productQuantity;
      $newProduct->price = $request->productPrice;
      $newProduct->user_id = Auth::user()->id;
    }

    public function delete(Request $request)
    {
      //Para deletar preciso usar um product::destroy pelo ID
    }

    public function viewAllProducts(Request $request)
    {
      //Necessário usar Product()->all
    }

    public function viewEachProduct(Request $request)
    {
      // Necessário usar product()->find(ID)
    }
}
