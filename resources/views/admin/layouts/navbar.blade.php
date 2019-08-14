<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Tours</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('tour.show') }}"><i class="fa fa-circle-o"></i>
                            All Tours
                            <span class="label label-primary pull-right">{{ App\Tour::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('tour.create') }}"><i class="fa fa-circle-o"></i> Create Tour</a></li>

                    <li class="active">
                        <a href="{{ route('tour.createTourType') }}">
                            <i class="fa fa-circle-o"></i> Create Tour Type
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('tour.all-tour-types') }}">
                            <i class="fa fa-circle-o"></i>
                            All Tour Types
                            <span class="label label-primary pull-right">{{ App\TourType::count() }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Regions</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('region.show') }}"><i class="fa fa-circle-o"></i>
                            All Regions
                            <span class="label label-primary pull-right">{{ App\Region::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('region.create') }}"><i class="fa fa-circle-o"></i> Create Region</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Vacancy</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('vacancy.show') }}"><i class="fa fa-circle-o"></i>
                            All Vacancy
                            <span class="label label-primary pull-right">{{ App\Vacancy::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('vacancy.create') }}"><i class="fa fa-circle-o"></i> Create Vacancy</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Car driver</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('driver.show') }}"><i class="fa fa-circle-o"></i>
                            All Car driver
                            <span class="label label-primary pull-right">{{ App\CarDriver::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('driver.create') }}"><i class="fa fa-circle-o"></i> Create Car driver</a></li>
                    <li>
                        <a href="{{ route('vehicle-type.show') }}"><i class="fa fa-circle-o"></i>
                            All Vehicle Types
                            <span class="label label-primary pull-right">{{ App\VehicleType::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('vehicle-type.create') }}"><i class="fa fa-circle-o"></i> Create Vehicle Type</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>News</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('news.show') }}"><i class="fa fa-circle-o"></i>
                            All News
                            <span class="label label-primary pull-right">{{ App\News::count() }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('news.create') }}"><i class="fa fa-circle-o"></i> Create News</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Service</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('service.show') }}"><i class="fa fa-circle-o"></i>
                            All Service
                            <span class="label label-primary pull-right">{{ count(App\Service::all()) }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('service.create') }}"><i class="fa fa-circle-o"></i> Create Service</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Residence</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('hotel.show') }}"><i class="fa fa-circle-o"></i>
                            Hotels
                            <span class="label label-primary pull-right">{{ count(App\Residence::whereResidenceType(App\Residence::residence_type_hotel)->get()) }}</span>
                        </a>
                        <a href="{{ route('apartment.show') }}"><i class="fa fa-circle-o"></i>
                            Apartments
                            <span class="label label-primary pull-right">{{ count(App\Residence::whereResidenceType(App\Residence::residence_type_apartment)->get()) }}</span>
                        </a>
                        <a href="{{ route('hostel.show') }}"><i class="fa fa-circle-o"></i>
                            Hostel
                            <span class="label label-primary pull-right">{{ count(App\Residence::whereResidenceType(App\Residence::residence_type_hostel)->get()) }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('residence.create') }}"><i class="fa fa-circle-o"></i> Create Residence</a></li>
                    <li>
                        <a href="{{ route('room-type.show') }}"><i class="fa fa-circle-o"></i>
                            All Room Types
                            <span class="label label-primary pull-right">{{ count(App\RoomType::all()) }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('room-type.create') }}"><i class="fa fa-circle-o"></i> Create Room Type</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Restaurant</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('restaurant.show') }}"><i class="fa fa-circle-o"></i>
                            All Restaurants
                            <span class="label label-primary pull-right">{{ count(App\Restaurant::all()) }}</span>
                        </a>
                    </li>
                    <li class="active"><a href="{{ route('restaurant.create') }}"><i class="fa fa-circle-o"></i> Create Restaurant</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Pages</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(count(\App\Page::all()))
                        @foreach(\App\Page::all() as $page)
                            <li>
                                <a href="{{ route('page.update', ['slug' => $page->slug]) }}"><i class="fa fa-circle-o"></i>
                                    {{ $page->name_en }}
                                    <span class="label label-primary pull-right"></span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i><span>Setting</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('setting.update') }}"><i class="fa fa-circle-o"></i>
                        Update  
                        </a>
                        <a href="{{ route('gallery.update') }}"><i class="fa fa-circle-o"></i>
                        Update Gallery 
                        </a>
                    </li>
                </ul>
            </li>
           {{--  <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>