<!-- Menu -->
   <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
      <a href="{{ route('administrator') }}" class="app-brand-link">
         <span class="app-brand-logo demo">
            <img src="{{ url('/assets/administrator/img/logo.png') }}">
         </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
         <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item active">
            <a href="index.html" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home-circle"></i>
               <div data-i18n="Analytics">Dashboard</div>
            </a>
         </li>

         <!-- Layouts -->
         <li class="menu-item">
            <a href="{{ route('website') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-globe"></i>
               <div data-i18n="globe">Visit Site</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-media') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-image"></i>
               <div data-i18n="Settings">Media Library</div>
            </a>
         </li>
         <li class="menu-header small text-uppercase">
            <span class="menu-header-text">-</span>
         </li>
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-user"></i>
               <div data-i18n="Account Settings">Users</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('admin-all-users') }}" class="menu-link">
                     <div data-i18n="Notifications">All Users</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-users','teacher') }}" class="menu-link">
                     <div data-i18n="Notifications">Teachers</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-users','student') }}" class="menu-link">
                     <div data-i18n="Connections"> Students </div>
                  </a>
               </li>
            </ul>
         </li>
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-calendar"></i>
               <div data-i18n="Account Settings">Schedules</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('admin-slots') }}" class="menu-link">
                     <div data-i18n="Notifications">Manage Slots</div>
                  </a>
               </li>

            </ul>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-courses') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-book"></i>
               <div data-i18n="Settings">Courses</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-batches') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-image"></i>
               <div data-i18n="Settings">Batches</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-orders') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-cart-alt"></i>
               <div data-i18n="Settings">Orders</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-orders') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
               <div data-i18n="Settings">Reports</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-referrers') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-user"></i>
               <div data-i18n="Settings">Referrer</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-refer-earn') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-rupee"></i>
               <div data-i18n="Settings">Refer & Earn</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
               <div data-i18n="Authentications">Accessibility</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('manage-roles') }}" class="menu-link">
                     <div data-i18n="Basic">Manage Accessibility</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('permissions') }}" class="menu-link">
                     <div data-i18n="Basic">Permissions</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('role-master') }}" class="menu-link">
                     <div data-i18n="Basic">Create Accessibility</div>
                  </a>
               </li>
            </ul>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-settings') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-cog"></i>
               <div data-i18n="Settings">Settings</div>
            </a>
         </li>   
      </ul>
   </aside>
<!-- / Menu -->