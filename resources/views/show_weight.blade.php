@extends('layout')

@section('content')
    <div class="col-md-5">
        <h3 class="text-center">Show Weight</h3>
        <form method="POST" id="data" name="updateWeight" role="form" action="{{ url('/update-weight/'.$weight->uuid) }}" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control" id="datepicker" name="date" placeholder="Input Date" value="{{$weight->date}}">
                @if ($errors->has('date'))
                    <font color="red">
                        <strong>{{ $errors->first('date') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Max</label>
                <input type="number" class="form-control" id="max" name="max" placeholder="Max Weight" value="{{$weight->max}}">
                @if ($errors->has('max'))
                    <font color="red">
                        <strong>{{ $errors->first('max') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Min</label>
                <input type="number" class="form-control" id="min" name="min" placeholder="Max Weight" value="{{$weight->min}}">
                @if ($errors->has('min'))
                    <font color="red">
                        <strong>{{ $errors->first('min') }}</strong>
                    </font>
                @endif
            </div>
            <div class="form-group">
                <label>Variance</label>
                <input type="number" class="form-control" id="variance" name="variance" p value="{{$weight->max - $weight->min}}" readonly>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>
@endsection