@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    @include('includes.employee_header')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-1">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                         <form action="{{route('employee.passwordStore')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="image"><p>Current Password</p></label>
                        <!--                        <div v-if="editCategoryData.image.name">-->
                        <div class="mt-n3">
                            <input type="password" name="oldPassword" class="form-control" placeholder="Current Password">

                        </div><br>
                        <label for="image"><p>New Password</p></label>
                        <!--                        <div v-if="editCategoryData.image.name">-->
                        <div class="mt-n3">
                            <input type="password" name="newPassword" class="form-control" placeholder="New Password">

                        </div><br>
                        <label for="image"><p>Confirm Password</p></label>
                        <!--                        <div v-if="editCategoryData.image.name">-->
                        <div class="mt-n3">
                            <input type="password" name="newPasswordConfirmation" class="form-control" placeholder="Confirm Password">

                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Change Password</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
