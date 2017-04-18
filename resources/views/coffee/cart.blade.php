@extends('layouts.app')

@section('title')
    Categories of Coffee
@stop

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Cart Details</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="panel panel-success">
                            <div class="panel-heading">{{Session::has('cart') ? Session::get('cart')->totalQty : 0}} Items in your cart</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td>Coffee Name</td>
                                        <td>Unit Prices</td>
                                        <td>Quantity</td>
                                        <td>Prices</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $pd)
                                        <tr>
                                            <td>{{$pd['item']['coffee_name']}}</td>
                                            <td>{{$pd['item']['price']}} MMK</td>
                                            <td>{{$pd['qty']}}</td>
                                            <td>{{$pd['item']['price'] * $pd['qty']}} MMK</td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="#" data-toggle="dropdown"><button type="button" class="btn btn-sm"><span class="glyphicon glyphicon-circle-arrow-down"></span></button></a>
                                                    <ul class="dropdown-menu">
                                                        @if($pd['qty'] == '1')
                                                            <li><a href="{{route('removeItem',['id'=>$pd['item']['id']])}}">Reduce this Product</a></li>
                                                        @else
                                                            <li><a href="{{route('reduceByOne',['id'=>$pd['item']['id']])}}">Reduce One Item</a></li>
                                                            <li><a href="{{route('removeItem',['id'=>$pd['item']['id']])}}">Reduce this Product</a></li>
                                                            @endif

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="3">Total Prices</td>
                                        <td>{{$totalPrice}} MMK</td>
                                        <td><a href="{{route('clearCart')}}" class="alert-link">Clear Cart</a></td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop