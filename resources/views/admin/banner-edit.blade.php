@extends('layouts.admin')
@section('title')
    Admin Dashboard || Edit Banner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="inbox-title">
                    <b>Banner Edit Form</b>
                    <hr>
                </div>
                <div class="ibox-body">
                    <form action="{{route('banner.update',$banner_data->id)}}" method="post" enctype="multipart/form-data" class="form-group">
                        @method('put')
                        @csrf
                        <input value="{{$banner_data->title}}" name="title" class="form-group form-control col-sm-9" type="text" placeholder="Enter Title"  required>
                        @error('title')
                        <span class="help-block error">{{$message}}</span>
                        @enderror
                        <input value="{{$banner_data->link}}" name="link" class="form-group form-control col-sm-9" type="url" placeholder="Enter link" required>
                        @error('link')
                        <span class="help-block error">{{$message}}</span>
                        @enderror

                        <select name="status" class="form-group form-control col-sm-9">
                            @if($banner_data->status=='active')
                            <option value="active">Publish</option>
                                <option value="inactive">Un-Publish</option>
                            @else
                                <option value="inactive">Un-Publish</option>
                                <option value="active">Publish</option>
                                @endif

                            <input type="file" class="form-group form-control col-sm-9" name="image" id="image" accept="image/*">
                                @error('image')
                                <span class="help-block error">{{$message}}</span>
                                @enderror
                        </select>

                        <button type="submit" class="btn btn-primary col-sm-1" ><i class="fa fa-paper-plane"></i>Save</button>
                        <button type="reset" class="btn btn-danger col-sm-1" ><i class="fa fa-trash"></i>Reset</button>
                        <img class="img form-group" id="img" src="{{asset('uploads/banner1500x400/'.$banner_data->image)}}" alt="banner" height="100" >

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

