  <button class="kt-aside-close " id="kt_aside_close_btn">
    <i class="la la-close"></i>
  </button>

  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
      <div class="kt-aside__brand-logo text-center">
        <a href="">{{config('app.name')}}
        </a>
      </div>
    </div>

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
      data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">

        <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
          <a href="{{route('home')}}" class="kt-menu__link ">
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
          <span class="kt-menu__link-text">Home</span>
        </a>
      </li>

      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Master Data</h4>
      </li>

      <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/surat-izin-praktik/create') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="" class="kt-menu__link kt-menu__toggle">
          <span class="kt-menu__link-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect id="bound" x="0" y="0" width="24" height="24"/>
                <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"/>
              </g>
            </svg>
          </span><span class="kt-menu__link-text">Buat Surat Perizinan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
          <div class="kt-menu__submenu ">
            <span class="kt-menu__arrow"></span>
            <ul class="kt-menu__subnav">
              <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                <span class="kt-menu__link"><span class="kt-menu__link-text">Buat Surat Perizinan</span></span>
              </li>
              <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/surat-izin-praktik/create') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{route('sip.create')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Surat Izin Praktik (SIP)</span></a>
              </li>
              <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('admin/kelas') || request()->is('admin/kelas/*') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Surat Izin Kerja (SIK)</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/sedang-ditinjau') || request()->is('perizinan/ditolak') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
          <a href="" class="kt-menu__link kt-menu__toggle">
            <span class="kt-menu__link-icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect id="bound" x="0" y="0" width="24" height="24"/>
                  <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                  <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"/>
                </g>
              </svg>
            </span><span class="kt-menu__link-text">Surat Perizinan Anda</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
            <div class="kt-menu__submenu ">
              <span class="kt-menu__arrow"></span>
              <ul class="kt-menu__subnav">
                <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                  <span class="kt-menu__link"><span class="kt-menu__link-text">Surat Perizinan Anda</span></span>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/sedang-ditinjau') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                  <a href="{{route('perizinan.ditinjau')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Sedang Ditinjau</span></a>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/telah-terbit') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                  <a href="{{route('perizinan.terbit')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Diterima</span></a>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('perizinan/ditolak')  ? 'kt-menu__item--active' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                  <a href="{{route('perizinan.ditolak')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Ditolak</span></a>
                </li>
              </ul>
            </div>
          </li>

          <li class="kt-menu__item kt-menu__item--submenu {{ (request()->is('keluhan') ? 'kt-menu__item--active kt-menu__item--open' : '') }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
            <a href="{{route('keluhan.index')}}" class="kt-menu__link kt-menu__toggle {{ ( request()->is('keluhan') ? 'kt-menu__item--active' : '') }}">
              <span class="kt-menu__link-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                  </g>
                </svg>
              </span><span class="kt-menu__link-text">Buat Keluhan Dan Saran </span></a>
            </li>

            </ul>
          </div>
        </div>
      </div>
