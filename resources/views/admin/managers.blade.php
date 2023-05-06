@extends('layout')

@section('content')

<x-admin-bar />

<div class="container">
    <!--container start-->
    <div class="row">
        <div class="col-md-12">


            <div class="panel">
                <div class="table-responsive">
                    <table class="table table-striped title1">
                        @if($errors->any())
                        <tr colspan="5">
                            <center>
                                <button type="button" class="btn btn-danger toastrDefaultError">
                                    {{$errors->first()}}
                                </button>
                            </center>
                        </tr>
                        @endif
                        <tr>
                            <td>
                                <b>N</b>
                            </td>
                            <td>
                                <b>Names</b>
                            </td>
                            <td>
                                <b>Email</b>
                            </td>
                            <td>
                                <b>Phone</b>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                {{$item->id}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->phone}}
                            </td>
                            <td>
                                <b><a href="#" class='btn btn-danger btn-sm' data-toggle="modal" data-target="#delete"
                                        id="{{$item->id}}">Delete</a></b>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <a href="#" class='btn btn-success btn-lg' data-toggle="modal" data-target="#add">Add</a>
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Are you sure you want to create new
                                        Manager?</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="/admin/managers" method="post">
                                        @csrf
                                        <fieldset>
                                            <label>Names </label>
                                            <input class="form-control" name="name" type="text" required><br>
                                            <label>Email </label>
                                            <input class="form-control" name="email" type="email" required><br>
                                            <label>Phone </label>
                                            <input class="form-control" name="phone" type="number" required><br>
                                            <label>Tank </label>
                                            <input class="form-control" name="tank_id" type="number" required><br>
                                            <label>Password </label>
                                            <input class="form-control" name="password" type="password" required><br>
                                            <button type="submit" class="btn btn-lg btn-success btn-block">Create
                                                acount</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop