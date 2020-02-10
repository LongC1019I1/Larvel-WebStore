@extends('layouts.master')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="share_name" value={{ $user->name }} />
                </div>
                <div class="form-group">
                    <label for="price">Email:</label>
                    <input type="text" class="form-control" name="share_price" value={{ $user->email }} />
                </div>
                <div class="form-group">
                    <label for="quantity">Password:</label>
                    <input type="text" class="form-control" name="share_qty" value={{ $user->password }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection