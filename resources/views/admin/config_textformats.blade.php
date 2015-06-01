@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Text formatting and filtering</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <p>Below is a list of all the text formats that have been created for this website.<br>
            Feel free to modify any of them to your liking or create your own custom text formats and filters.<br>
            Please note that the default formats have limited options for modifications.<br>x
            This is a security feature in order to keep a high level of security in the application.
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Full HTML<br>
                        <small><em>This text formatting filter gives almost unrestricted access for writing HTML code</em></small>
                    </td>
                    <td>
                        <a href="#" class="btn btn-default">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Restricted HTML<br>
                        <small><em>This text formatting filter gives access to the usage of basic html tags that are commonly used by content authors</em></small>
                    </td>
                    <td>
                        <a href="#" class="btn btn-default">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Only text<br>
                        <small><em>This text formatting filter does not allow any html tags. Html tags that are written in the textfield will be showed as text. This is normally used for comments and other content that is not authored by authorized users</em></small>
                    </td>
                    <td>
                        <a href="#" class="btn btn-default">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop