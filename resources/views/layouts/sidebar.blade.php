<!-- Menu -->
   <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
      <a href="{{ route('website') }}" class="app-brand-link">
         <img src="{{ url('assets/administrator/img/logo.png') }}">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
         <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item active">
            <a href="{{ route('website') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home-circle"></i>
               <div data-i18n="Analytics">Dashboard</div>
            </a>
         </li>

         @role('super-admin')
         <li class="menu-item">
            <a href="{{ route('administrator') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-cog"></i>
               <div data-i18n="globe">Administrator</div>
            </a>
         </li>
         @endrole

         <!-- Layouts -->
         <li class="menu-item">
            <a href="https://devsov.baazar.live/" class="menu-link">
               <i class="menu-icon tf-icons bx bx-globe"></i>
               <div data-i18n="globe">Visit Site</div>
            </a>
         </li>
         
         <li class="menu-header small text-uppercase">
            <span class="menu-header-text">-</span>
         </li>
        
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-calendar"></i>
               <div data-i18n="Account Settings">Sessions</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('batches') }}" class="menu-link">
                     <div data-i18n="Notifications">Manage Sessions</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('add-batch') }}" class="menu-link">
                     <div data-i18n="Notifications">Create Sessions</div>
                  </a>
               </li>

            </ul>
         </li>
         <li class="menu-item">
            <a href="{{ route('reports') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
               <div data-i18n="Report">Report</div>
            </a>
         </li>
        
         
      </ul>
   </aside>
<!-- / Menu -->