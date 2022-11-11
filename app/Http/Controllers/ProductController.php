<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Hien thi toan bo
    function index(){
        // Lay du lieu
        $products = DB::table('products')->get();

        // Tra ve view -> view se render ra man hinh
        return view('product/index',['products'=> $products]);
    }

    // Xoa 1 sp theo id
    function delete($id){
        DB::table('products')->delete($id);
        return redirect()->route('home');
    }

    // View: Tao san pham
    function create(){
        return view('product.create');
    }
    // Ko co giao dien: them san pham
    function save(Request $request){
        // Lay du lieu
        $name = $request->get('productName');
        $price = $request->get('productPrice');
        $image = $request->get('productImageURL');
        $description = $request->get('productDescription');

        // Insert
        DB::table('products')->insert(
            ['name'=>$name,'price'=>$price,'image'=>$image,'description'=>$description]
        );
        // Chuyen huong ve trang home
        return redirect()->route('home');


    }
}
