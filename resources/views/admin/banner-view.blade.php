@extends('layouts.admin')
@section('title')
    Admin Dashboard || View Banner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">

                <div class="ibox-head">
                    <div class="ibox-title">Banner View</div>
                    <a href="{{route('banner.create')}}"><button class="btn btn-success btn-sm"><i class="fa fa-plus">Add Banner</i> </button> </a>

                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($banner_data)
                            @foreach($banner_data as $value)
                        <tr>
                            <td>{{$value->title}}</td>
                            <td>{{$value->link}}</td>

                            <td><a href="{{asset('uploads/banner1500x400/'.$value->image)}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye">View</i></a></td>
                            <td>
                                <span class="btn badge badge-{{$value->status=='active'?'success':'danger'}}">{{$value->status=='active'?'Publish':"Unpublish"}}</span>
                            </td>
                            <td>
                                <a href="{{route('banner.edit',$value->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                        <td>
                                    <form method="post" action="{{route('banner.destroy',$value->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to delete this banner?')"><i class="fa fa-trash"></i></button>
                                    </form>

                            </td>
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
