@extends('layout')

@section('content')
    <div class="col-md-5">
        <h3 class="text-center">Add Product</h3>
        <form method="POST" id="data" name="addProduct" role="form" action="{{ url('/product') }}" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Input Product Name">
                @if ($errors->has('product_name'))
                    <font color="red">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Input Quantity">
                @if ($errors->has('quantity'))
                    <font color="red">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection