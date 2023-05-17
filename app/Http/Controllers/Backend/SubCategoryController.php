<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }
    public function SubCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_uz' => 'required',
            'category_id' => 'required',
        ],[
            'subcategory_name_en.required' => 'Inglizcha nom kiritilmadi',
            'subcategory_name_uz.required' => 'O`zbekcha nom kiritilmadi',
            'category_id.required' => 'Turkum tanlanmadi',
        ]);
        
        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_uz' => $request->subcategory_name_uz,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
            'subcategory_slug_uz' => str_replace(' ', '-',$request->category_name_uz),
            'category_id' => $request->category_id,
        ]);
        $notification = array(
            'message'=> 'Yangi yordam turkum qo`shildi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }
    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_uz' => $request->subcategory_name_uz,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_uz' => str_replace(' ', '-',$request->subcategory_name_uz),
            'category_id' => $request->category_id,
        ]);
        $notification = array(
            'message'=> 'Muvaffaqqiyatli yangilandi',
            'alert-type'=> 'info',
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function SubCategoryDelete($id){
        $subcategory = SubCategory::findOrFail($id);
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Yordamchi tur o`chirildi',
            'alert-type'=> 'info',
        );
        return redirect()->route('all.category')->with($notification);

    }
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory','categories'));
    }
    public function GetSubCategoryView($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
    public function GetSubSubCategoryView($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }
    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_uz' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ],[
            'subsubcategory_name_en.required' => 'Inglizcha nom kiritilmadi',
            'subsubcategory_name_uz.required' => 'O`zbekcha nom kiritilmadi',
            'category_id.required' => 'Turkum tanlanmadi',
            'subcategory_id.required' => 'yordamchi tur tanlanmadi',
        ]);
        
        SubSubCategory::insert([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_uz' => $request->subsubcategory_name_uz,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_uz' => str_replace(' ', '-',$request->subsubcategory_name_uz),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
        $notification = array(
            'message'=> 'Yangi yordam ichki qo`shildi',
            'alert-type'=> 'info',
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('subcategories','categories','subsubcategories'));
    }
    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_uz' => $request->subsubcategory_name_uz,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_uz' => str_replace(' ', '-',$request->subsubcategory_name_uz),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
        $notification = array(
            'message'=> 'Muvaffaqqiyatli yangilandi',
            'alert-type'=> 'info',
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
    public function SubSubCategoryDelete($id){
        $subsubcategory = SubSubCategory::findOrFail($id);
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Yordamchi ichki tur o`chirildi',
            'alert-type'=> 'info',
        );
        return redirect()->route('all.subsubcategory')->with($notification);

    }
}