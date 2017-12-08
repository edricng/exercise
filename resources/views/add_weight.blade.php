@extends('layout')

@section('content')
    <div class="col-md-5">
        <h3 class="text-center">Add Weight</h3>
        <form method="POST" id="data" name="addWeight" role="form" action="{{ url('/weight') }}" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Input Date">
                @if ($errors->has('date'))
                    <font color="red">
                        <strong>{{ $errors->first('date') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Max</label>
                <input type="number" class="form-control" id="max" name="max" placeholder="Max Weight">
                @if ($errors->has('max'))
                    <font color="red">
                        <strong>{{ $errors->first('max') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Min</label>
                <input type="number" class="form-control" id="min" name="min" placeholder="Max Weight">
                @if ($errors->has('min'))
                    <font color="red">
                        <strong>{{ $errors->first('min') }}</strong>
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