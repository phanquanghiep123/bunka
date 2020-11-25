@php 
    $c = $_SEFF->getcountNotifications() ;
@endphp
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{asset('/')}}">
            <img src="{{asset('/images/logo.png')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{asset('/')}}">
            <img src="{{asset('/images/logo-mini.png')}}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <a href="#" style="color: #fff;font-size: 22px;" class="menu-bar"><i class="mdi mdi-menu" aria-hidden="true"></i></a>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="javascript:;" onclick="SeeNotifition({{$c}})" data-toggle="dropdown">
                    <i class="mdi mdi-bell"></i>
                    {!! $c > 0 ? '<span class="count">' .$c. '</span>' : '' !!}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">{{ $_SEFF->getLangLableValue('[_lable_notifycation_]',['{NUMBER}'],[$c]) }}</p>
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="content-notifycation">
                        <?php 
                            $notifications = $_SEFF->getNotifications(0,10,false);
                        ?>
                        <?php 
                            if($notifications){
                                foreach ($notifications as $key => $value) {?>
                                    <a href="<?php echo $value->url_detail;?>"  class="dropdown-item preview-item {{$value->table}}">
                                        <div class="preview-item-content"><i class="mdi {{($value->view_detail == 1) ? 'mdi-check' : 'mdi-eye'}}"></i> <?php echo $value->title?></div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <?php }
                            }    
                        ?> 
                    </div>
                    <div class="more-block-notifycation" style="display: none;">
                        <a href="javascript:;" id="more-notifycation" data-offset="1"><i class="mdi mdi-chevron-double-down"></i> [_more_]</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" style="object-fit: cover;" src="{{asset(@$_SEFF->_LANG->icon ?? 'html/images/flags/GB.png')}}" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown lang-header" aria-labelledby="UserDropdown">
                    @foreach(@$_SEFF->_LANGS as $key => $value)
                        @if($value->id != $_SEFF->_LANG->id)
                            <a href="javascript:;" onclick="changeLang({{$value->id}});" class="dropdown-item mt-{{$value->id}}"><img style="width: 30px;height: 30px;margin-right: 10px;object-fit: cover;" class="img-xs rounded-circle" src="{{asset(@$value->icon)}}" alt="Profile image"> {{@$value->name}}</a>
                        @endif
                    @endforeach

                </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="profile-text">[_hello_], {{$_SEFF->_USER->first_name}} {{$_SEFF->_USER->last_name}} !</span>
                    @if($_SEFF->_USER->photo)
                        <img class="img-xs rounded-circle" src="{{asset($_SEFF->_USER->photo)}}" alt="Profile image">
                    @else
                        <img class="img-xs rounded-circle" src="{{asset('images/fotog.png')}}" alt="Profile image">
                    @endif  
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item p-0">
                        <div class="d-flex border-bottom">
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                            </div>
                            <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                            </div>
                        </div>
                    </a>
                    @php
                        $profile_menu = $_SEFF->GetMenuBySlug('menu-profile',true);
                    @endphp
                    @if($profile_menu)
                        @foreach ($profile_menu as $key => $value)
                            <a href="{{asset($value->path)}}" class="dropdown-item {{$value->class_name}}">{{$value->get_name()}}</a>
                        @endforeach
                    @endif
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>