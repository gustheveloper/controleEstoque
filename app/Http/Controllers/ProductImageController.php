?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_Image;

class ProductImageController extends Controller
{
      public function create(Request $request)
      {
        $newProductImage = new product_image();
        $newProduct->url_image = $request->productName;
        $newProduct->description = null;
        $newProduct->quantity = $request->productQuantity;
        $newProduct->price = $request->productPrice;
        $newProduct->user_id = Auth::user()->id;

        $result = $newProductImage->save();

        return view('products.form', ["result"=>$result]);
      }
}
