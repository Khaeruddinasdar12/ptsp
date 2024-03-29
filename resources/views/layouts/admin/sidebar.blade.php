  <button class="kt-aside-close " id="kt_aside_close_btn">
    <i class="la la-close"></i>
  </button>

  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
      <div class="kt-aside__brand-logo text-center">
        <a href="">PTSP
          <!-- <img class="img-fluid" alt="Logo" src="" style="width: 100%;" /> -->

        </a>
      </div>
    </div>

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
      data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">

        @php $role = Auth::guard('admin')->user()->role; $endpoint = ''; @endphp
        <li class="kt-menu__item {{ (request()->is('admin') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true">
          <a href="{{route('admin.dashboard')}}" class="kt-menu__link ">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                <path
                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                fill="#000000" fill-rule="nonzero"></path>
                <path
                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                fill="#000000" opacity="0.3"></path>
              </g>
            </svg>
          </span>
          <span class="kt-menu__link-text">Dashboard</span>
        </a>
      </li>

      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Master Data</h4>
      </li>
      
      @if($role == 'bidang')
      @php $endpoint = route('perizinan.bidang.index'); @endphp
      @elseif($role == 'teknis')
      @php $endpoint = route('perizinan.teknis.index'); @endphp
      @elseif($role == 'kadis')
      @php $endpoint = route('perizinan.kadis.index'); @endphp
      @endif


      @if($role == 'bidang' || $role == 'teknis' || $role == 'kadis')
      <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/perizinan-bidang') || request()->is('admin/perizinan-bidang/*') || request()->is('admin/perizinan-teknis') || request()->is('admin/perizinan-kadis') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="{{ $endpoint }}" class="kt-menu__link kt-menu__toggle {{ (request()->is('admin/perizinan-bidang') || request()->is('admin/perizinan-teknis') || request()->is('admin/perizinan-kadis') ? 'kt-menu__item--active' : '') }}">
          <span class="kt-menu__link-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
              </g>
            </svg>
          </span>
          <span class="kt-menu__link-text">Perizinan </span>
        </a>
      </li>
      @endif

      <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/manage-keluhan') || request()->is('admin/manage-keluhan/*') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="{{route('manage.keluhan.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/manage-keluhan*') ? 'kt-menu__item--active' : '') }}">
          <span class="kt-menu__link-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L6,18 C4.34314575,18 3,16.6568542 3,15 L3,6 C3,4.34314575 4.34314575,3 6,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z" fill="#000000" opacity="0.3"/>
                <path d="M7.5,12 C6.67157288,12 6,11.3284271 6,10.5 C6,9.67157288 6.67157288,9 7.5,9 C8.32842712,9 9,9.67157288 9,10.5 C9,11.3284271 8.32842712,12 7.5,12 Z M12.5,12 C11.6715729,12 11,11.3284271 11,10.5 C11,9.67157288 11.6715729,9 12.5,9 C13.3284271,9 14,9.67157288 14,10.5 C14,11.3284271 13.3284271,12 12.5,12 Z M17.5,12 C16.6715729,12 16,11.3284271 16,10.5 C16,9.67157288 16.6715729,9 17.5,9 C18.3284271,9 19,9.67157288 19,10.5 C19,11.3284271 18.3284271,12 17.5,12 Z" fill="#000000" opacity="0.3"/>
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Keluhan Dan Saran </span></a>
        </li>

        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/laporan') || request()->is('admin/laporan/*') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="{{route('laporan.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/laporan/*') ? 'kt-menu__item--active' : '') }}">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Laporan </span></a>
        </li>

        @if($role == 'admin')
        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/manage-user') || request()->is('admin/manage-user/*') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="{{route('manage.user.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/manage-user*') ? 'kt-menu__item--active' : '') }}">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Manage User </span></a>
        </li>
        @endif 

        @if($role == 'superadmin')        

        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/manage-user') || request()->is('admin/manage-user/*') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="{{route('manage.user.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/manage-user*') ? 'kt-menu__item--active' : '') }}">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Manage User </span></a>
        </li>

        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/manage-admin') || request()->is('admin/manage-admin/*') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="{{route('manage.admin.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/manage-admin*') ? 'kt-menu__item--active' : '') }}">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Manage Admin </span></a>
        </li>

        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/setting') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="{{route('setting.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('/admin/setting') ? 'kt-menu__item--active' : '') }}">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Settings </span></a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>
