@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $key => $product)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->desc}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{asset('storage/'.$product->image)}}" style="width: 100px"></td>
                        <td>{{$product->category->name}}</td>
                        <td>
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('product.destroy', $product->id)}}" class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete</a>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">No data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="col-6 float-left">
                <a href="{{route('product.create')}}" class="btn btn-success">Create New Product</a>
            </div>
            <div class="col-6 float-left">
                <div class="pagination float-right mr-4">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
