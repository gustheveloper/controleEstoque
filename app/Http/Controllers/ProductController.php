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
      $newProduct = new Product();
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

    public function viewFormUpdate(Request $request, $id = 0)
    {
      $product = Product::find($id);
      if($product){
        return view('products.formupdate', ['product'=>$product]);
      }else{
        return view('products.formupdate');
      }

    }

    public function update(Request $request)
    {
      // O parametro vai ser um ID do produto, buscar um objeto ao invés de buscar.
      $product = product::find($request->productID);
      $product->name = $request->productName;
      $product->description = $request->productDescription;
      $product->quantity = $request->productQuantity;
      $product->price = $request->productPrice;

      $result = $product->save();

      return view ('products.formupdate', ['result'=>$result]);

    }

    public function delete(Request $request, $id=0)
    {
      //Para deletar preciso usar um product::destroy pelo ID
      $result = product::destroy($id);
      if ($result){
        return redirect('/produtos');
      }

    }

    public function viewAllProducts(Request $request)
    {
      $productsList = product::all();
      return view ('products.products', ['productsList'=>$productsList]);
    }

    public function viewEachProduct(Request $request)
    {
      // Necessário usar product()::find(ID)
    }
}
