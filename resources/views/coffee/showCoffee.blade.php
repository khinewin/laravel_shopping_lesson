@extends('layouts.app')

@section('title')
    Show Coffee
@stop

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">Show Coffee</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">Coffee List</div>
                            <div class="panel-body" id="showCoffee">
                            <form action="{{route('deleteCoffee')}}" method="post">
                                {{csrf_field()}}
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="alert-success">
                                        <td>ID</td>
                                        <td>Pictures</td>
                                        <td>Coffee Name</td>
                                        <td>Prices</td>
                                        <td>Categories</td>
                                        <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cfs as $cf)
                                    <tr class="alert-warning">
                                        <td>{{$cf->id}}</td>
                                        <td>
                                            <img src="{{route('showCoffeePhoto',['fileName'=>$cf->photo])}}" class="img-rounded">
                                        </td>
                                        <td>{{$cf->coffee_name}}</td>
                                        <td>MMK {{$cf->price}}</td>
                                        <td>{{$cf->cat->cat_name}}</td>
                                        <td><input type="checkbox" name="delCoffee[]" value="{{$cf->id}}" class="checkbox"></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    {{$cfs->links()}}
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">New Coffee</div>
                            <div class="panel-body">
                                <form role="form" method="post" action="{{route('newCoffee')}}" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="photo" class="control-label">Coffee Cover</label>
                                        <input type="file" name="photo" id="photo">
                                    </div>
                                    <div class="form-group">
                                        <label for="coffee_name" class="control-label">Coffee Name</label>
                                        <input type="text" name="coffee_name" id="coffee_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="control-label">Coffee Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="0">Please select Category</option>
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="control-label">Prices</label>
                                        <input type="number" name="price" id="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" >Save</button>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop