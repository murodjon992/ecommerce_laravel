<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }
    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_uz' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Inglizcha nom kiritilmadi',
            'category_name_uz.required' => 'O`zbekcha nom kiritilmadi',
            'category_icon.required' => 'Ikon tanlanmadi',
        ]);
        
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_uz' => $request->category_name_uz,
            'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
            'category_slug_uz' => str_replace(' ', '-',$request->category_name_uz),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message'=> 'Yangi turkum qo`shildi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_uz' => $request->category_name_uz,
            'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
            'category_slug_uz' => str_replace(' ', '-',$request->category_name_uz),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message'=> 'Muvaffaqqiyatli yangilandi',
            'alert-type'=> 'success',
        );
        return redirect()->route('all.category')->with($notification);
    }
    public function CategoryDelete($id){
        $category = Category::findOrFail($id);
        Category::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Categoriya o`chirildi',
            'alert-type'=> 'info',
        );
        return redirect()->route('all.category')->with($notification);

    }
}
