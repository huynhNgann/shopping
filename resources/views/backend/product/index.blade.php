@extends('backend.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header',['name'=>'category','key'=>'List'])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->feature_image_path}}</td>
                        <td>{{$product->content}}</td>
                        <td>{{$product->content}}</td>
                        <td>
                          {{-- <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-default">Edit</a>
                          <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger">Delete</a> --}}
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col-md-12">
              {{ $products->onEachSide(5)->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
  @endsection