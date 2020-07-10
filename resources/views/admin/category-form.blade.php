@extends('layouts.admin')
@section('title')
    Admin Dashboard || Add Category
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="inbox-title">
                    <b>Category Add Form</b>
                    <hr>
                </div>

                <div class="ibox-body">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" class="form-group">
                        @csrf
                        <input name="title" class="form-group form-control col-sm-9" type="text" placeholder="Enter Title"  required>
                        @error('title')
                        <span class="help-block error">{{$message}}</span>
                        @enderror
                        <textarea name="summary" class="form-group form-control col-sm-9" type="text" placeholder="Enter summary" required rows="5" style="resize:none
;"></textarea>
                        @error('summary')
                        <span class="help-block error">{{$message}}</span>
                        @enderror
                        <script type="text/javascript">
                            function ShowHideDiv(chkPassport) {
                                var dvPassport = document.getElementById("dvPassport");
                                dvPassport.style.display = chkPassport.checked ? "none" : "block";
                            }
                        </script>
                            <label for="chkPassport" class="ui-checkbox ui-checkbox-primary">
                                <input type="checkbox"  id="chkPassport" checked="true" onclick="ShowHideDiv(this)" >
                                <span class="input-span"></span>Is Parent</label>
                        <br>
                        <div id="dvPassport" style="display: none">
                            <select class="form-group form-control col-sm-9" type="text" id="txtPassportNumber">
                                <option value="">--Please Select Parent Category</option>
                            </select>

                        </div>
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

