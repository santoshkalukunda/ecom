@extends('layouts.admin')
@section('title')
    Admin Dashboard || Add Banner
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="inbox-title">
                <b>Banner Add Form</b>
                <hr>
            </div>

            <div class="ibox-body">
                <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <input name="title" class="form-group form-control col-sm-9" type="text" placeholder="Enter Title"  required>
                    @error('title')
                    <span class="help-block error">{{$message}}</span>
                    @enderror
                    <input name="link" class="form-group form-control col-sm-9" type="url" placeholder="Enter link" required>
                    @error('link')
                    <span class="help-block error">{{$message}}</span>
                    @enderror
                    <input type="file" class="form-group form-control col-sm-9" name="image" id="image" accept="image/*" required>
                    @error('image')
                    <span class="help-block error">{{$message}}</span>
                    @enderror
                    <select name="status" class="form-group form-control col-sm-9">
                        <option value="active">Publish</option>
                        <option value="inactive">Un-Publish</option>
                    </select>
                    <button type="submit" class="btn btn-primary col-sm-1" ><i class="fa fa-paper-plane"></i>Save</button>
                    <button type="reset" class="btn btn-danger col-sm-1" ><i class="fa fa-trash"></i>Reset</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
