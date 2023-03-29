<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\productColor;
use App\Models\productInventory;
use App\Models\ProductSize;
use App\Models\productSizeN;
use App\Models\subcategory;
use App\Models\thumbnaill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class productController extends Controller
{
    //product add
    function add_product(){
        $categorys =  category::all();
        $subcategorys = subcategory::all();
        $brands = brand::all();
        return view('admin.product.add_product', [
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
            'brands'=>$brands,
        ]);
    }

    // ajax get subcategory
    function getsubcategory(Request $request){
        $subcategorys = subcategory::where('category_id', $request->category_id)->get();
        $str = '<option value="" disabled>-- Subcategory Menu --</option>';
        foreach($subcategorys as $subcategory){
            $str .= '<option value="'. $subcategory->id .'">' .$subcategory->subcategory_name .'</option>';
        }
        echo $str;
    }

    // product store
    function product_store(Request $request){
        $request->validate([
            'product_name'=>'required',
            'product_type'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
            'unit'=>'required',
            'long_desp'=>'required',
            'sku'=>'required',
            'quantity'=>'required',
            'buy_price'=>'required',
        ]);
        $product_id =  product::insertGetId([
            'product_name'=>$request->product_name,
            'product_type'=>$request->product_type,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'unit'=>$request->unit,
            'exchange'=>$request->exchange,
            'refund'=>$request->refund,
            'long_desp'=>$request->long_desp,
            'sku'=>Str::lower(str_replace('', '-', $request->sku).'-'. rand(10000000,99999999)),
            'quantity'=>$request->quantity,
            'buy_price'=>$request->buy_price,
            'discount'=>$request->discount,
            'total_price'=>$request->buy_price - ($request->buy_price*$request->discount/100),
            'slug'=>Str::lower(str_replace('', '-', $request->product_name).'-'. rand(100000,999999)),
            'created_at'=>Carbon::now(),
        ]);

        $product_img = $request->product_img;
        $extention = $product_img->getClientOriginalExtension();
        $file_name = Str::lower($request->product_name).'-'. rand(100000,999999).'.'.$extention;
        Image::make($product_img)->save(public_path('uplode/product/'. $file_name));

        product::find($product_id)->update([
            'product_img'=>$file_name,
        ]);

        foreach($request->thumbnail as $thumbnail){
            $extention = $thumbnail->getClientOriginalExtension();
            $file_name = Str::lower($request->product_name).'-'. rand(100000,999999).'.'.$extention;
            Image::make($thumbnail)->save(public_path('uplode/product/thumbnail/'. $file_name));

            thumbnaill::insert([
                'product_id'=>$product_id,
                'thumbnail'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);
        }

        return back()->with('success', 'Add Product Successfully');
    }


    // product list view
    function product_list(){
        $products = product::all();
        return view('admin.product.product_list', [
            'products'=>$products,
        ]);
    }

    // product delete
    function product_delete($product_id){
        $thumbnail = thumbnaill::where('product_id', $product_id)->get();
        foreach($thumbnail as $thum){
            $thum_img = thumbnaill::where('id', $thum->id)->first()->thumbnail;
            $thum_img_delete = public_path('uplode/product/thumbnail/'. $thum_img);
            unlink($thum_img_delete);

            thumbnaill::find($thum->id)->delete();
        }

        $product_image = product::where('id', $product_id)->first()->product_img;
        $product_img_delete = public_path('uplode/product/'. $product_image);
        unlink($product_img_delete);

        product::find($product_id)->delete();
        return back()->with('prodelete', 'Product Delete Successfully');
    }

    // product inventory
    function product_inventory($product_id){

        $products =  product::where('id', $product_id)->get();
        $colors = productColor::all();
        $sizes = ProductSize::all();
        $sizenumber = productSizeN::all();
        $productInventory = productInventory::where('product_id', $product_id)->get();
        return view('admin.product.product_inv', [
            'products'=>$products,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'sizenumber'=>$sizenumber,
            'productInventory'=>$productInventory,
        ]);
    }

    // product inventory store
    function inventory_store(Request $request){
        productInventory::insert([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id, 
            'sizen_id'=>$request->sizen_id, 
            'quantity'=>$request->quantity,
        ]);
        return back()->with('seccess', 'Product Inventory Add Successfully');
    }

    // product inventory delete
    function inventory_delete($inventory_id){
        productInventory::find($inventory_id)->delete();
        return back()->with('invdel', 'Inventory Delete Successfully');
    }
}
