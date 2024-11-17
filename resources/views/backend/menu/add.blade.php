@extends('backend.layouts.admin')
@section('title')
    <title>Thêm danh mục</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('backend.partials.content-header', ['name' => 'menu', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên menu</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Nhập tên menu" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Chọn menu cha</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                                @error('parent_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
