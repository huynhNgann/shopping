@extends('backend.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('backend.partials.content-header',['name'=>'category','key'=>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                          <a href="{{route('categories.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                        
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
          
            </div>
            <div class="col-md-12">
              {{ $categories->onEachSide(5)->links() }}
            </div>
        </div>
      </div>
    </div>
  </div>
  @endsection