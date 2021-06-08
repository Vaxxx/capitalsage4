<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
            <i class="fa fa-user-circle-o"></i>

            <div class="title">Number of Staff</div>
            <div class="count">{{$noOfUsers}}
                <div class="text-center bg-secondary text-white msg ">@include('includes.messages')</div>
            </div>
        </div>
        <!--/.info-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="">
            <div class="info-box brown-bg">
                <i class="fa fa-plus"></i>
                <div class="count">Add Employee</div>

            </div>
        </a>
        <!--/.info-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="">
            <div class="info-box dark-bg">
                <i class="fa fa-thumbs-o-up"></i>
                <div class="title">Key Performance Indicator</div>
                <div class="count">KPI</div>

            </div>
        </a>
        <!--/.info-box-->
    </div>
    <!--/.col-->

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="{{route('admin.appraisal')}}">
            <div class="info-box green-bg">
                <i class="fa fa-cubes"></i>
                <div class="count">Appraisal</div>
            </div>
        </a>
        <!--/.info-box-->
    </div>
    <!--/.col-->

</div>
