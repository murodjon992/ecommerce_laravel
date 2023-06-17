<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }
    public function StoreProduct(Request $request){
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;
        $product_id =  Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_uz' => $request->product_name_uz,
            'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
            'product_slug_uz' => strtolower(str_replace(' ','-', $request->product_name_uz)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_uz' => $request->product_tags_uz,
            'product_size_en' => $request->product_size_en,
            'product_size_uz' => $request->product_size_uz,
            'product_color_en' => $request->product_color_en,
            'product_color_uz' => $request->product_color_uz,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_uz' => $request->short_descp_uz,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_uz' => $request->long_descp_uz,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_dears' => $request->special_dears,
            'status' => 1,
            'product_thambnail' => $save_url,
            'created_at' => Carbon::now()
        ]);

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/multi-img/'.$make_name);
            $upload_path = 'upload/products/multi-img/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now()
            ]);
        }
        $notification = array(
            'message'=> 'Yangi Mahsulot qo`shildi',
            'alert-type'=> 'info',
        );
        return redirect()->back()->with($notification);
    }
    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }
    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories','subcategory','subsubcategory','brands','products','multiImgs'));
    }
    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_uz' => $request->product_name_uz,
            'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
            'product_slug_uz' => strtolower(str_replace(' ','-', $request->product_name_uz)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_uz' => $request->product_tags_uz,
            'product_size_en' => $request->product_size_en,
            'product_size_uz' => $request->product_size_uz,
            'product_color_en' => $request->product_color_en,
            'product_color_uz' => $request->product_color_uz,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_uz' => $request->short_descp_uz,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_uz' => $request->long_descp_uz,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_dears' => $request->special_dears,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message'=> 'Mahsulot rasmsiz yangilandi',
            'alert-type'=> 'info',
        );
        return redirect()->route('manage-product')->with($notification);

    }

    public function MultiImageUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach($imgs as $id => $img){
            $imfDel = MultiImg::findOrFail($id);
           unlink($imfDel->photo_name);
            
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-img/'.$name_gen);
            $uploadPath = 'upload/products/multi-img/'. $name_gen;
            
            MultiImg::where('id',$id)->update([
                'photo_name'=> $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        }
        $notification = array(
            'message' => 'Mahsulot rasmi yangilandi',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);

    }

    public function MultiImageDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'Mahsulot rasmi o`chirildi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
         
    }
    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message'=> 'Mahsulot tugadi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message'=> 'Mahsulot mavjud',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message'=> 'Mahsulot o`chirildi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    } 
}
