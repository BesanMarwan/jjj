<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @can('الرئيسية')
                    <li>
                        <a href="{{route('admin.dashboard')}}"  data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">الرئيسية</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    @endcan
                    <!-- menu title -->
                    @can('الاقسام')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الاقسام</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">الاقسام</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.categories.index')}}">قائمة الاقسام </a></li>

                        </ul>
                    </li>
                    @endcan
                    <!-- menu item calendar-->
                    @can('الاخبار')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">الاخبار</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('admin.posts.index')}}">قائمة الاخبار </a> </li>
                        </ul>
                    </li>
                @endcan

                <!-- menu item todo-->
                   <!-- <li>
                        <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">التعليقات</span> </a>
                    </li>-->
                    <!-- menu item chat-->
                    @can('الصفحات الثابتة')
                    <li>
                        <a href="{{route('admin.pages.index')}}"><i class="ti-comments"></i><span class="right-nav-text">الصفحات الثابتة
                            </span></a>
                    </li>
                    @endcan
                <!-- menu item calendar-->
                    @can('المستخدمين')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#user">
                                <div class="pull-left"><i class="ti-user"></i><span
                                        class="right-nav-text">المستخدمين</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="user" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('users.index')}}">قائمة المستخدمين </a> </li>
                            </ul>
                        </li>
                    @endcan

                @can('الاعدادات')
                        <li>
                            <a href="{{route('admin.settings.index')}}"><i class="ti-settings"></i><span class="right-nav-text">اعدادات الموقع
                            </span></a>
                        </li>
                    @endcan

                <!-- menu item mailbox-->
                    @can('الايميلات')
                    <li>
                        <a href=""><i class="ti-email"></i><span class="right-nav-text">صندوق الوارد</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                    </li>
                @endcan


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
