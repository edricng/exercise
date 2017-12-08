@extends('layout')

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">#1 Number</h3>
        <form method="POST" id="data" name="addNumber" role="form" action="{{ url('/number') }}" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Input Number</label>
                <input type="number" class="form-control" id="number" name="number" placeholder="Input Number" min="0" value="5">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </form>
    </div>

    <div class="col-md-12 line"></div>

    <div class="col-md-12">
        <h3 class="text-center">#2 Cart <a class="btn btn-info btn-cart pull-right" href="/view-cart">Show Cart</a></h3>
        @if(session()->has('product_message'))
            <div class="alert alert-success">
                {{ session()->get('product_message') }}
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">Product</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!--Looping-->
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>
                            <form method="POST" id="data" name="addProductToCart" role="form" action="{{ url('/cart') }}" enctype="multipart/form-data" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{$product->quantity}}" class="text-box-quantity">
                                    <input type="text" id="uuid" name="uuid" value="{{$product->uuid}}" hidden>
                                    <button type="submit" class="btn btn-primary">Add To Cart</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No Data
                        </td>
                    </tr>
                @endforelse
                <!--end of Looping-->
            </tbody>
        </table>
        <div class="btn-action">
            <h4>Add New Product</h4>
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
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12 line"></div>

    <div class="col-md-12 margin-bottom-20">
        <h3 class="text-center">#3 Weight Logging App</h3>
        @if(session()->has('weight_message'))
            <div class="alert alert-success">
                {{ session()->get('weight_message') }}
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Max</th>
                    <th class="text-center">Min</th>
                    <th class="text-center">Variance</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!--Looping-->
                @forelse ($weights as $weight)
                    <tr>
                        <td>{{ $weight->date }}</td>
                        <td>{{ $weight->max }}</td>
                        <td>{{ $weight->min }}</td>
                        <td>{{ $weight->max - $weight->min}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{url('/weight/'.$weight->uuid)}}">View/Edit</a>
                            <a class="btn btn-danger" href="{{url('/delete-weight/'.$weight->uuid)}}">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No Data
                        </td>
                    </tr>
                @endforelse
                <!--end of Looping-->
                <tr>
                    <td><b>Average</b></td>
                    <td>{{round($average_max,2)}}</td>
                    <td>{{round($average_min,2)}}</td>
                    <td>{{round($average_variance,2)}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="/add">Add Weight</a>
    </div>
@endsection
