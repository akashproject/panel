<!-- Menu -->
   <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
      <a href="{{ route('website') }}" class="app-brand-link">
         <span class="app-brand-logo demo">
            
         </span>
         <span class="app-brand-text demo menu-text fw-bolder ms-2">Baazar Live</span>
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

         <!-- Layouts -->
         <li class="menu-item">
            <a href="{{ route('website') }}" class="menu-link">
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
         
      </ul>
   </aside>
<!-- / Menu -->