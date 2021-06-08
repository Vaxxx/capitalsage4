@extends('layouts.member_template')
@section('sidebar')
    @include('includes.employee_sidebar')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-7">
                <h3 style="color:#727272;">CHANGE PASSWORD</h3>
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
@endsection
