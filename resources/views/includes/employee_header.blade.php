<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="info-box blue-bg">
            <i class="fa fa-user-circle-o"></i>

            <div class="title">Number of Appraisal</div>
            <div class="count">
               {{$appraisalsCount}}
            </div>
        </div>
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

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <a href="{{route('employee.goals')}}">
            <div class="info-box green-bg">
                <i class="fa fa-bullseye"></i>
                <div class="count">Goals</div>
            </div>
        </a>
        <!--/.info-box-->
    </div>
    <!--/.col-->
    <div class="text-center bg-secondary text-white msg ">@include('includes.messages')</div>


</div>
