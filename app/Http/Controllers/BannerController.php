<?php

namespace App\Http\Controllers;

use App\Model\Banner;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    protected $banner=null;
    public function __construct(Banner $banner)
    {
        $this->banner= $banner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->banner=$this->banner->orderBy('id','DESC')->get();
        return view('admin.banner-view')->with('banner_data',$this->banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.banner-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->banner->getAddRules();
        $request->validate($rules);
        $data=$request->all();
       $data['added_by']=$request->user()->id;
        if ($request->image){
            $image_name = uploadImage($request->image, 'banner'. env('BANNER_IMAGE_SIZE','1500x400'));
            // $image_name=uploadImage($request->image,'banner',env('BANNER_IMAGE_SIZE','1500x400'));
       if ($image_name){
           $data['image']=$image_name;
       }
        }
        /*
        if($request->image){
            $path=public_path().'/uploads/banner';
            if(File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }
            $file_name="bannner-".date("Ymdhis").rand(0,9999).".".$request->image->getClientOriginalExtension();
            $status=$request->image->move($path,$file_name);
            if($status){
                Image::make($path.'/'.$file_name)->resize(1500,400,function($aspet){
                    return $aspet->aspectRatio();
                })->save($path."/Thumb-".$file_name);
                $data['image']=$file_name;
            }
        }
        */
        $this->banner->fill($data);
        $status=$this->banner->save();
        if ($status){
            $request->session()->flash('success','Banner added successfully');
        }else{
            $request->session()->flash('error','Problem while adding Banner');
        }
        return redirect()->route('banner.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->banner=$this->banner->findOrFail($id);
        return view('admin.banner-edit')->with('banner_data',$this->banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=$this->banner->getEditRules();
        $request->validate($rules);
        $this->banner=$this->banner->findOrFail($id);
        $data=$request->all();
        $data['added_by']=$request->user()->id;
        if ($request->image){
            $image_name = uploadImage($request->image, 'banner'. env('BANNER_IMAGE_SIZE','1500x400'));
            // $image_name=uploadImage($request->image,'banner',env('BANNER_IMAGE_SIZE','1500x400'));
            if ($image_name){
                $data['image']=$image_name;
                deleteImage($this->banner->image,'banner1500x400');
            }
        }

/*
        if($request->image){
            $path=public_path().'/uploads/banner';
            if(File::exists($path)){
                File::makeDirectory($path,0777,true,true);
            }
            $file_name="bannner-".date("Ymdhis").rand(0,9999).".".$request->image->getClientOriginalExtension();
            $status=$request->image->move($path,$file_name);
            if($status){
                Image::make($path.'/'.$file_name)->resize(1500,400,function($aspet){
                    return $aspet->aspectRatio();
                })->save($path."/Thumb-".$file_name);
                $data['image']=$file_name;
                deleteImage($this->banner->image,'banner');
            }
        }
*/
        $this->banner->fill($data);
        $status=$this->banner->save();
        if ($status){
            $request->session()->flash('success','Banner update successfully');
        }else{
            $request->session()->flash('error','Problem while updating Banner');
        }
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->banner=$this->banner->findOrFail($id);

        $img=$this->banner->image;
        $del=$this->banner->delete();
        if ($del){
            deleteImage($img,'banner1500x400');
            request()->session()->flash('success','banner deleteded success');
        }else{
            request()->session()->flash('error','Sorry! there is problem while deleting banner');
        }
        return redirect()->route('banner.index');
    }
}
