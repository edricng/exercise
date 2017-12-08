@extends('layout')

@section('content')
    <div class="col-md-12">
        <h3 class="text-center">My Cart
            <a class="btn btn-info" href="/">Back to Home</a>

        </h3>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!--Looping-->
                @forelse ($carts as $index => $cart)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{ $cart->product_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{url('/remove-item/'.$cart->uuid)}}">Remove from cart</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No Item on Cart
                        </td>
                    </tr>
                @endforelse
                <!--end of Looping-->
            </tbody>
        </table>
    </div>
@endsection