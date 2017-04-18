@extends('layouts.app')

@section('title')
    My Laravel
    @stop

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                @foreach($coffees as $cf)
                    <div class="col-sm-6 col-sm-4">
                        <div class="thumbnail clearfix">
                            <img src="{{route('coffeePhoto',['fileName'=>$cf->photo])}} " class="img-rounded" alt="...">
                            <div class="caption">
                                <h3>{{$cf->coffee_name}}</h3>
                                <p>{{$cf->cat->cat_name}}</p>
                                <p><a href="{{route('addToCart',['id'=>$cf->id])}}" class="btn btn-primary btn-sm pull-right" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a> {{$cf->price}}MMK</p>
                            </div>
                        </div>
                    </div>

                    @endforeach
            </div>
            <div class="text-center">{{$coffees->links()}}</div>
        </div>
    </div>
    @stop