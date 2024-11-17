@extends('backend.layouts.admin')
@section('title')
    <title>Thêm sản phẩm</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-asset/product/add/add.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backend.partials.content-header', ['name' => 'Product', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Nhâp tên sản phẩm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" id="price" name="price" class="form-control"
                                    placeholder="Nhâp giá sản phẩm" value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" id="feature_image_path" name="feature_image_path" class="form-control-file"
                                    value="{{ old('feature_image_path') }}">
                                @error('feature_image_path')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple id="image_path" name="image_path[]" class="form-control-file"
                                    value="{{ old('image_path[]') }}">
                                @error('image_path')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select selected="selected" id="parent_id" name="parent_id"
                                    class="form-control select2_init">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('parent_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select name="tags" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea id="mytextarea" name="content" class="form-control tinymce_editor_init" rows="8"></textarea>
                        

                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.tiny.cloud/1/bzzgnu5u3ga3rbydn6oc36zyd1kp8htgrkxdb9jff8uo03sg/tinymce/5/tinymce.min.js"></script> --}}
    <script src="https://cdn.tiny.cloud/1/bzzgnu5u3ga3rbydn6oc36zyd1kp8htgrkxdb9jff8uo03sg/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="{{asset('admin-asset/product/add/add.js')}}"></script>
    
@endsection
