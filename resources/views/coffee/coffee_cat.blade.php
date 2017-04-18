@extends('layouts.app')

@section('title')
    Categories of Coffee
    @stop

@section('content')
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Categories of Coffee</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-success">
                                <div class="panel-heading">Categories List</div>
                                <div class="panel-body">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr class="alert-success">
                                            <td>ID</td>
                                            <td>Categories Name</td>
                                            <td>Delete</td>

                                        </tr>
                                        </thead>
                                    <tbody id="showCat"></tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">New Category</div>
                                <div class="panel-body">
                                    <form role="form">
                                        <div id="msgAddCat"></div>
                                        <div class="form-group">
                                            <label for="category_name" class="control-label">Category Name</label>
                                            <input type="text" name="category_name" id="category_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block" id="btnAddCat">Save</button>
                                        </div>
                                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @stop