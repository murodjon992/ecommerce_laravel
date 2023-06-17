<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ],[
            'slider_img.required' => 'Iltimos birorta rasm tanlang',
        ]);
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,350)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
        
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);
        $notification = array(
            'message'=> 'Slider qo`shildi',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function SliderEdit($id) {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('sliders'));
    }
    public function SliderUpdate(Request $request) {
        $slider_id = $request->id;
        $old_image = $request->old_image;
        if ($request->file('slider_img')) {
            unlink($old_image); 
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,350)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
            
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
            $notification = array(
                'message'=> 'Slider rasm bilan yangilandi',
                'alert-type'=> 'success',
            );
            return redirect()->route('manage-slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            $notification = array(
                'message'=> 'Slider rasmsiz yangilandi',
                'alert-type'=> 'success',
            );
            return redirect()->route('manage-slider')->with($notification);
        }
        
    }
    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Slider o`chirildi',
            'alert-type'=> 'danger',
        );
        return redirect()->back()->with($notification);

    }
    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message'=> 'Slider inactive o`zgartirildi',
            'alert-type'=> 'danger',
        );
        return redirect()->back()->with($notification);

    }
    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message'=> 'Slider active o`zgartirildi',
            'alert-type'=> 'danger',
        );
        return redirect()->back()->with($notification);

    }
}
