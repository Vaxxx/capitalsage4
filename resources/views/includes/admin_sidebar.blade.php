<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{route('admin.index')}}">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{route('admin.create')}}" class="">
                    <i class="icon_document_alt"></i>
                    <span>Employee</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{route('admin.kpi')}}" class="">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span>KPI</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="{{route('admin.appraisal')}}" class="">
                    <i class="fa fa-cubes"></i>
                    <span>Appraisal</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
