@extends('admin.layouts.master')
@section('content')
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Search</span>
        </div>
        <input
            type="text"
            class="form-control"
            id="search-product"
            placeholder="name product"
          >
    </div>

    <div class="row">
        <div class="col-12">
            <button
                class="btn btn-primary"
                id="hide-image">Hide Image
            </button>
{{--            <input id="size-image" type="number" value="4">--}}
            <table
                class=" table  table-striped ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th
                        class="image-product">Image
                    </th>
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
                        <td class="image-product">
                            <img src="{{asset('storage/'.$product->image)}}"
                                 class="image-thumbnail-product" style="width: 100px"
                                 >
                        </td>
                        <td>
                            {{$product->category->name}}
                        </td>
                        <td>
                            <a
                                href="{{route('product.show', $product->id)}}"
                                class="btn btn-info">Show
                            </a>
                            <a
                                href="{{route('product.destroy', $product->id)}}"
                                class="btn btn-danger"
                               onclick="return confirm('bạn có chắc chắn muốn xóa không ?')">Delete
                            </a>
                            <a
                                href="{{route('product.edit', $product->id)}}"
                                class="btn btn-primary">Edit
                            </a>
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
