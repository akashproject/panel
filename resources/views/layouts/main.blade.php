<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ isset($contentMain->title)?$contentMain->title:'Accounts | Finance | Taxation | Courses | Training Institute' }}</title>
    <meta name="facebook-domain-verification" content="he9zy5upymc72288m3qpcwda5dygul" />
    <meta name="description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Accounts | GST | Tally | SAP | Learn accounts, finance, taxation, and banking job guarantee courses. Enroll with India&#039;s No.1 Educational Training Institute.' }}" />
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{ isset($contentMain->title)?$contentMain->title:'' }}">
    <meta name="robots" content="{{ isset($contentMain->robots)?$contentMain->robots:'' }}" />
    <meta name="google-site-verification" content="_Is7-guFC312LQs0E9yYfc90B7NW6Dx--HQZrLtBeLs" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="ICA Edu Skills" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ isset($contentMain->title)?$contentMain->title:'Accounts | Finance | Taxation | Courses | Training Institute | Computerized Accounts Training Institute' }}" />
    <meta property="og:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Accounts | GST | Tally | SAP | Learn accounts, finance, taxation, and banking job guarantee courses. Enroll with India&#039;s No.1 Educational Training Institute.' }}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="https://www.facebook.com/ICAJobguarantee" />
    <meta property="og:image:secure_url" content="https://www.facebook.com/ICAJobguarantee" />
    <meta property="og:video" content="https://www.youtube.com/channel/UC6WWqdZzUMAsZqTQHRyEj_A" />
    <meta property="og:video:secure_url" content="https://www.youtube.com/channel/UC6WWqdZzUMAsZqTQHRyEj_A" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@IcaSkills" />
    <meta name="twitter:title" content="{{ isset($contentMain->title)?$contentMain->title:'Accounts | Finance | Taxation | Courses | Training Institute | Computerized Accounts Training Institute' }}" />
    <meta name="twitter:description" content="{{ isset($contentMain->meta_description)?$contentMain->meta_description:'Accounts | GST | Tally | SAP | Learn accounts, finance, taxation, and banking job guarantee courses. Enroll with India&#039;s No.1 Educational Training Institute.' }}" />
    <meta name="twitter:creator" content="@IcaSkills" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="ica-admin" />
    <meta name="twitter:label2" content="Est. reading time" />
    <meta name="twitter:data2" content="1 minute" />
    <!-- Css -->
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />


    <!-- Styles -->
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/datatables-bs5/responsive.bootstrap5.css') }}">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/teacher/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('assets/teacher/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('assets/teacher/vendor/css/rtl/demo.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/teacher/vendor/css/rtl/page-profile.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/css/own.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/administrator/vendor/css/pages/page-auth.css') }}" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ url('assets/administrator/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('assets/administrator/js/config.js') }}"></script>
    @yield('style')
</head>

<body>
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
   <div class="layout-container">
      @include('layouts.header')
      <div class="layout-page">
         <!-- Content wrapper -->
         <div class="content-wrapper">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0" data-bg-class="bg-menu-theme" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
               <div class="container-xxl d-flex h-100">
                  <a href="#" class="menu-horizontal-prev disabled"></a>
                  <div class="menu-horizontal-wrapper">
                     <ul class="menu-inner" style="margin-left: 0px;">
                        <!-- Dashboards -->
                        <li class="menu-item">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-home-circle"></i>
                              <div data-i18n="Dashboards">Dashboards</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item">
                                 <a href="dashboards-analytics.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-pie-chart-alt-2"></i>
                                    <div data-i18n="Analytics">Analytics</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="dashboards-crm.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-shape-circle"></i>
                                    <div data-i18n="CRM">CRM</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-ecommerce-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                                    <div data-i18n="eCommerce">eCommerce</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-logistics-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-car"></i>
                                    <div data-i18n="Logistics">Logistics</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-academy-dashboard.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-book-open"></i>
                                    <div data-i18n="Academy">Academy</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!-- Layouts -->
                        <li class="menu-item">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-layout"></i>
                              <div data-i18n="Layouts">Layouts</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item">
                                 <a href="layouts-without-menu.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-menu"></i>
                                    <div data-i18n="Without menu">Without menu</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="../vertical-menu-template/" class="menu-link" target="_blank">
                                    <i class="menu-icon tf-icons bx bx-vertical-center"></i>
                                    <div data-i18n="Vertical">Vertical</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="layouts-fluid.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-fullscreen"></i>
                                    <div data-i18n="Fluid">Fluid</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="layouts-container.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-exit-fullscreen"></i>
                                    <div data-i18n="Container">Container</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="layouts-blank.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-square-rounded"></i>
                                    <div data-i18n="Blank">Blank</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!-- Apps -->
                        <li class="menu-item">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-customize"></i>
                              <div data-i18n="Apps">Apps</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item">
                                 <a href="app-email.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-envelope"></i>
                                    <div data-i18n="Email">Email</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-chat.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-chat"></i>
                                    <div data-i18n="Chat">Chat</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-calendar.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                                    <div data-i18n="Calendar">Calendar</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="app-kanban.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-grid"></i>
                                    <div data-i18n="Kanban">Kanban</div>
                                 </a>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                                    <div data-i18n="eCommerce">eCommerce</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-ecommerce-dashboard.html" class="menu-link">
                                          <div data-i18n="Dashboard">Dashboard</div>
                                       </a>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Products">Products</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="app-ecommerce-product-list.html" class="menu-link">
                                                <div data-i18n="Product List">Product List</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-product-add.html" class="menu-link">
                                                <div data-i18n="Add Product">Add Product</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-category-list.html" class="menu-link">
                                                <div data-i18n="Category List">Category List</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Order">Order</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="app-ecommerce-order-list.html" class="menu-link">
                                                <div data-i18n="Order List">Order List</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-order-details.html" class="menu-link">
                                                <div data-i18n="Order Details">Order Details</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Customer">Customer</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="app-ecommerce-customer-all.html" class="menu-link">
                                                <div data-i18n="All Customers">All Customers</div>
                                             </a>
                                          </li>
                                          <li class="menu-item
                                             ">
                                             <a href="javascript:void(0);" class="menu-link menu-toggle">
                                                <div data-i18n="Customer Details">Customer Details</div>
                                             </a>
                                             <ul class="menu-sub">
                                                <li class="menu-item">
                                                   <a href="app-ecommerce-customer-details-overview.html" class="menu-link">
                                                      <div data-i18n="Overview">Overview</div>
                                                   </a>
                                                </li>
                                                <li class="menu-item">
                                                   <a href="app-ecommerce-customer-details-security.html" class="menu-link">
                                                      <div data-i18n="Security">Security</div>
                                                   </a>
                                                </li>
                                                <li class="menu-item">
                                                   <a href="app-ecommerce-customer-details-billing.html" class="menu-link">
                                                      <div data-i18n="Address &amp; Billing">Address &amp; Billing</div>
                                                   </a>
                                                </li>
                                                <li class="menu-item">
                                                   <a href="app-ecommerce-customer-details-notifications.html" class="menu-link">
                                                      <div data-i18n="Notifications">Notifications</div>
                                                   </a>
                                                </li>
                                             </ul>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-ecommerce-manage-reviews.html" class="menu-link">
                                          <div data-i18n="Manage Reviews">Manage Reviews</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-ecommerce-referral.html" class="menu-link">
                                          <div data-i18n="Referrals">Referrals</div>
                                       </a>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Settings">Settings</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-detail.html" class="menu-link">
                                                <div data-i18n="Store Details">Store Details</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-payments.html" class="menu-link">
                                                <div data-i18n="Payments">Payments</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-checkout.html" class="menu-link">
                                                <div data-i18n="Checkout">Checkout</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-shipping.html" class="menu-link">
                                                <div data-i18n="Shipping &amp; Delivery">Shipping &amp; Delivery</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-locations.html" class="menu-link">
                                                <div data-i18n="Locations">Locations</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-ecommerce-settings-notifications.html" class="menu-link">
                                                <div data-i18n="Notifications">Notifications</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-book-open"></i>
                                    <div data-i18n="Academy">Academy</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-academy-dashboard.html" class="menu-link">
                                          <div data-i18n="Dashboard">Dashboard</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-academy-course.html" class="menu-link">
                                          <div data-i18n="My Course">My Course</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-academy-course-details.html" class="menu-link">
                                          <div data-i18n="Course Details">Course Details</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-car"></i>
                                    <div data-i18n="Logistics">Logistics</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-logistics-dashboard.html" class="menu-link">
                                          <div data-i18n="Dashboard">Dashboard</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-logistics-fleet.html" class="menu-link">
                                          <div data-i18n="Fleet">Fleet</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-food-menu"></i>
                                    <div data-i18n="Invoice">Invoice</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-invoice-list.html" class="menu-link">
                                          <div data-i18n="List">List</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-invoice-preview.html" class="menu-link">
                                          <div data-i18n="Preview">Preview</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-invoice-edit.html" class="menu-link">
                                          <div data-i18n="Edit">Edit</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-invoice-add.html" class="menu-link">
                                          <div data-i18n="Add">Add</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Users">Users</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-user-list.html" class="menu-link">
                                          <div data-i18n="List">List</div>
                                       </a>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="View">View</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="app-user-view-account.html" class="menu-link">
                                                <div data-i18n="Account">Account</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-user-view-security.html" class="menu-link">
                                                <div data-i18n="Security">Security</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-user-view-billing.html" class="menu-link">
                                                <div data-i18n="Billing &amp; Plans">Billing &amp; Plans</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-user-view-notifications.html" class="menu-link">
                                                <div data-i18n="Notifications">Notifications</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="app-user-view-connections.html" class="menu-link">
                                                <div data-i18n="Connections">Connections</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-check-shield"></i>
                                    <div data-i18n="Roles &amp; Permissions">Roles &amp; Permissions</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="app-access-roles.html" class="menu-link">
                                          <div data-i18n="Roles">Roles</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="app-access-permission.html" class="menu-link">
                                          <div data-i18n="Permission">Permission</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                        <!-- Pages -->
                        <li class="menu-item">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-collection"></i>
                              <div data-i18n="Pages">Pages</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-store"></i>
                                    <div data-i18n="Front Pages">Front Pages</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                                          <div data-i18n="Landing">Landing</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                                          <div data-i18n="Pricing">Pricing</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="../front-pages/payment-page.html" class="menu-link" target="_blank">
                                          <div data-i18n="Payment">Payment</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="../front-pages/checkout-page.html" class="menu-link" target="_blank">
                                          <div data-i18n="Checkout">Checkout</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="../front-pages/help-center-landing.html" class="menu-link" target="_blank">
                                          <div data-i18n="Help Center">Help Center</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                                    <div data-i18n="User Profile">User Profile</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="pages-profile-user.html" class="menu-link">
                                          <div data-i18n="Profile">Profile</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-profile-teams.html" class="menu-link">
                                          <div data-i18n="Teams">Teams</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-profile-projects.html" class="menu-link">
                                          <div data-i18n="Projects">Projects</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-profile-connections.html" class="menu-link">
                                          <div data-i18n="Connections">Connections</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                    <div data-i18n="Account Settings">Account Settings</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="pages-account-settings-account.html" class="menu-link">
                                          <div data-i18n="Account">Account</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-account-settings-security.html" class="menu-link">
                                          <div data-i18n="Security">Security</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-account-settings-billing.html" class="menu-link">
                                          <div data-i18n="Billing &amp; Plans">Billing &amp; Plans</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-account-settings-notifications.html" class="menu-link">
                                          <div data-i18n="Notifications">Notifications</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-account-settings-connections.html" class="menu-link">
                                          <div data-i18n="Connections">Connections</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item">
                                 <a href="pages-faq.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-help-circle"></i>
                                    <div data-i18n="FAQ">FAQ</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="pages-pricing.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-diamond"></i>
                                    <div data-i18n="Pricing">Pricing</div>
                                 </a>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-shape-circle"></i>
                                    <div data-i18n="Misc">Misc</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="pages-misc-error.html" class="menu-link" target="_blank">
                                          <div data-i18n="Error">Error</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-misc-under-maintenance.html" class="menu-link" target="_blank">
                                          <div data-i18n="Under Maintenance">Under Maintenance</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-misc-comingsoon.html" class="menu-link" target="_blank">
                                          <div data-i18n="Coming Soon">Coming Soon</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="pages-misc-not-authorized.html" class="menu-link" target="_blank">
                                          <div data-i18n="Not Authorized">Not Authorized</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                                    <div data-i18n="Authentications">Authentications</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Login">Login</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-login-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-login-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Register">Register</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-register-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-register-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-register-multisteps.html" class="menu-link" target="_blank">
                                                <div data-i18n="Multi-steps">Multi-steps</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Verify Email">Verify Email</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-verify-email-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-verify-email-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Reset Password">Reset Password</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-reset-password-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-reset-password-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Forgot Password">Forgot Password</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-forgot-password-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Two Steps">Two Steps</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="auth-two-steps-basic.html" class="menu-link" target="_blank">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="auth-two-steps-cover.html" class="menu-link" target="_blank">
                                                <div data-i18n="Cover">Cover</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                                    <div data-i18n="Wizard Examples">Wizard Examples</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="wizard-ex-checkout.html" class="menu-link">
                                          <div data-i18n="Checkout">Checkout</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="wizard-ex-property-listing.html" class="menu-link">
                                          <div data-i18n="Property Listing">Property Listing</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="wizard-ex-create-deal.html" class="menu-link">
                                          <div data-i18n="Create Deal">Create Deal</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item">
                                 <a href="modal-examples.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-window-open"></i>
                                    <div data-i18n="Modal Examples">Modal Examples</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!-- Components -->
                        <li class="menu-item
                           active">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-code-block"></i>
                              <div data-i18n="Components">Components</div>
                           </a>
                           <ul class="menu-sub">
                              <!-- Cards -->
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-collection"></i>
                                    <div data-i18n="Cards">Cards</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="cards-basic.html" class="menu-link">
                                          <div data-i18n="Basic">Basic</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="cards-advance.html" class="menu-link">
                                          <div data-i18n="Advance">Advance</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="cards-statistics.html" class="menu-link">
                                          <div data-i18n="Statistics">Statistics</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="cards-analytics.html" class="menu-link">
                                          <div data-i18n="Analytics">Analytics</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="cards-gamifications.html" class="menu-link">
                                          <div data-i18n="Gamifications">Gamifications</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="cards-actions.html" class="menu-link">
                                          <div data-i18n="Actions">Actions</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <!-- User interface -->
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-box"></i>
                                    <div data-i18n="User interface">User interface</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="ui-accordion.html" class="menu-link">
                                          <div data-i18n="Accordion">Accordion</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-alerts.html" class="menu-link">
                                          <div data-i18n="Alerts">Alerts</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-badges.html" class="menu-link">
                                          <div data-i18n="Badges">Badges</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-buttons.html" class="menu-link">
                                          <div data-i18n="Buttons">Buttons</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-carousel.html" class="menu-link">
                                          <div data-i18n="Carousel">Carousel</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-collapse.html" class="menu-link">
                                          <div data-i18n="Collapse">Collapse</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-dropdowns.html" class="menu-link">
                                          <div data-i18n="Dropdowns">Dropdowns</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-footer.html" class="menu-link">
                                          <div data-i18n="Footer">Footer</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-list-groups.html" class="menu-link">
                                          <div data-i18n="List groups">List groups</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-modals.html" class="menu-link">
                                          <div data-i18n="Modals">Modals</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-navbar.html" class="menu-link">
                                          <div data-i18n="Navbar">Navbar</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-offcanvas.html" class="menu-link">
                                          <div data-i18n="Offcanvas">Offcanvas</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                                          <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-progress.html" class="menu-link">
                                          <div data-i18n="Progress">Progress</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-spinners.html" class="menu-link">
                                          <div data-i18n="Spinners">Spinners</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-tabs-pills.html" class="menu-link">
                                          <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-toasts.html" class="menu-link">
                                          <div data-i18n="Toasts">Toasts</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-tooltips-popovers.html" class="menu-link">
                                          <div data-i18n="Tooltips &amp; Popovers">Tooltips &amp; Popovers</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="ui-typography.html" class="menu-link">
                                          <div data-i18n="Typography">Typography</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <!-- Extended components -->
                              <li class="menu-item
                                 active">
                                 <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-copy"></i>
                                    <div data-i18n="Extended UI">Extended UI</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item active">
                                       <a href="extended-ui-avatar.html" class="menu-link">
                                          <div data-i18n="Avatar">Avatar</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-blockui.html" class="menu-link">
                                          <div data-i18n="BlockUI">BlockUI</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-drag-and-drop.html" class="menu-link">
                                          <div data-i18n="Drag &amp; Drop">Drag &amp; Drop</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-media-player.html" class="menu-link">
                                          <div data-i18n="Media Player">Media Player</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                                          <div data-i18n="Perfect Scrollbar">Perfect Scrollbar</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-star-ratings.html" class="menu-link">
                                          <div data-i18n="Star Ratings">Star Ratings</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-sweetalert2.html" class="menu-link">
                                          <div data-i18n="SweetAlert2">SweetAlert2</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-text-divider.html" class="menu-link">
                                          <div data-i18n="Text Divider">Text Divider</div>
                                       </a>
                                    </li>
                                    <li class="menu-item
                                       ">
                                       <a href="javascript:void(0);" class="menu-link menu-toggle">
                                          <div data-i18n="Timeline">Timeline</div>
                                       </a>
                                       <ul class="menu-sub">
                                          <li class="menu-item">
                                             <a href="extended-ui-timeline-basic.html" class="menu-link">
                                                <div data-i18n="Basic">Basic</div>
                                             </a>
                                          </li>
                                          <li class="menu-item">
                                             <a href="extended-ui-timeline-fullscreen.html" class="menu-link">
                                                <div data-i18n="Fullscreen">Fullscreen</div>
                                             </a>
                                          </li>
                                       </ul>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-tour.html" class="menu-link">
                                          <div data-i18n="Tour">Tour</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-treeview.html" class="menu-link">
                                          <div data-i18n="Treeview">Treeview</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="extended-ui-misc.html" class="menu-link">
                                          <div data-i18n="Miscellaneous">Miscellaneous</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <!-- Icons -->
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-crown"></i>
                                    <div data-i18n="Icons">Icons</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="icons-boxicons.html" class="menu-link">
                                          <div data-i18n="Boxicons">Boxicons</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="icons-font-awesome.html" class="menu-link">
                                          <div data-i18n="Fontawesome">Fontawesome</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                        <!-- Forms -->
                        <li class="menu-item
                           ">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-book-content"></i>
                              <div data-i18n="Forms">Forms</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-detail"></i>
                                    <div data-i18n="Form Elements">Form Elements</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="forms-basic-inputs.html" class="menu-link">
                                          <div data-i18n="Basic Inputs">Basic Inputs</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-input-groups.html" class="menu-link">
                                          <div data-i18n="Input groups">Input groups</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-custom-options.html" class="menu-link">
                                          <div data-i18n="Custom Options">Custom Options</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-editors.html" class="menu-link">
                                          <div data-i18n="Editors">Editors</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-file-upload.html" class="menu-link">
                                          <div data-i18n="File Upload">File Upload</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-pickers.html" class="menu-link">
                                          <div data-i18n="Pickers">Pickers</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-selects.html" class="menu-link">
                                          <div data-i18n="Select &amp; Tags">Select &amp; Tags</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-sliders.html" class="menu-link">
                                          <div data-i18n="Sliders">Sliders</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-switches.html" class="menu-link">
                                          <div data-i18n="Switches">Switches</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="forms-extras.html" class="menu-link">
                                          <div data-i18n="Extras">Extras</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-detail"></i>
                                    <div data-i18n="Form Layouts">Form Layouts</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="form-layouts-vertical.html" class="menu-link">
                                          <div data-i18n="Vertical Form">Vertical Form</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="form-layouts-horizontal.html" class="menu-link">
                                          <div data-i18n="Horizontal Form">Horizontal Form</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="form-layouts-sticky.html" class="menu-link">
                                          <div data-i18n="Sticky Actions">Sticky Actions</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-carousel"></i>
                                    <div data-i18n="Form Wizard">Form Wizard</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="form-wizard-numbered.html" class="menu-link">
                                          <div data-i18n="Numbered">Numbered</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="form-wizard-icons.html" class="menu-link">
                                          <div data-i18n="Icons">Icons</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item">
                                 <a href="form-validation.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-list-check"></i>
                                    <div data-i18n="Form Validation">Form Validation</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!-- Tables -->
                        <li class="menu-item
                           ">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                              <div data-i18n="Tables">Tables</div>
                           </a>
                           <ul class="menu-sub">
                              <!-- Tables -->
                              <li class="menu-item">
                                 <a href="tables-basic.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-table"></i>
                                    <div data-i18n="Tables">Tables</div>
                                 </a>
                              </li>
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-grid"></i>
                                    <div data-i18n="Datatables">Datatables</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="tables-datatables-basic.html" class="menu-link">
                                          <div data-i18n="Basic">Basic</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="tables-datatables-advanced.html" class="menu-link">
                                          <div data-i18n="Advanced">Advanced</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="tables-datatables-extensions.html" class="menu-link">
                                          <div data-i18n="Extensions">Extensions</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                        <!-- Charts & Maps -->
                        <li class="menu-item
                           ">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                              <div data-i18n="Charts &amp; Maps">Charts &amp; Maps</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item
                                 ">
                                 <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-chart"></i>
                                    <div data-i18n="Charts">Charts</div>
                                 </a>
                                 <ul class="menu-sub">
                                    <li class="menu-item">
                                       <a href="charts-apex.html" class="menu-link">
                                          <div data-i18n="Apex Charts">Apex Charts</div>
                                       </a>
                                    </li>
                                    <li class="menu-item">
                                       <a href="charts-chartjs.html" class="menu-link">
                                          <div data-i18n="ChartJS">ChartJS</div>
                                       </a>
                                    </li>
                                 </ul>
                              </li>
                              <li class="menu-item">
                                 <a href="maps-leaflet.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                                    <div data-i18n="Leaflet Maps">Leaflet Maps</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <!-- Misc -->
                        <li class="menu-item
                           ">
                           <a href="javascript:void(0)" class="menu-link menu-toggle">
                              <i class="menu-icon tf-icons bx bx-shape-circle"></i>
                              <div data-i18n="Misc">Misc</div>
                           </a>
                           <ul class="menu-sub">
                              <li class="menu-item">
                                 <a href="https://themeselection.com/support/" target="_blank" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-support"></i>
                                    <div data-i18n="Support">Support</div>
                                 </a>
                              </li>
                              <li class="menu-item">
                                 <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-file"></i>
                                    <div data-i18n="Documentation">Documentation</div>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
                  <a href="#" class="menu-horizontal-next"></a>
               </div>
            </aside>
            <!-- / Menu -->
            @yield('content')
            @include('layouts.footer')
         </div>
         <!--/ Content wrapper -->
      </div>
      <!--/ Layout container -->
   </div>
</div>
   
<script src="{{ url('assets/administrator/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ url('assets/administrator/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}" ></script>
<script src="{{ url('assets/administrator/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('assets/administrator/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('assets/administrator/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script src="{{ url('assets/administrator/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ url('assets/administrator/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
<!-- Main JS -->
<script src="{{ url('assets/administrator/js/main.js') }}"></script>
<!-- Page JS -->
<script src="{{ url('assets/administrator/js/dashboards-analytics.js') }}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!--Wave Effects -->
<script src="{{ url('assets/administrator/js/own.js') }}"></script>
    
</body>

</html>