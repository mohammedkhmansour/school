@include('layouts.head')

<body>

<div class="wrapper">

<!--=================================
 preloader -->

<div id="pre-loader">
    <img src="{{asset('admin/images/pre-loader/loader-01.svg')}}" alt="">
</div>

<!--=================================
 preloader -->

<!--=================================
 header start-->

@include('layouts.main-header')

<!--=================================
 header End-->

<!--=================================
 Main content -->

<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar -->
@include('layouts.main-saidbar')
<!-- Left Sidebar End-->

<!--=================================
 Main content -->

 <!--=================================
wrapper -->

  <div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Page Title</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Page Title</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
      <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
          <div class="card-body">
            @yield('content')
          </div>
        </div>
      </div>
  </div>

 <!--=================================
 wrapper -->

<!--=================================
 footer -->

@include('layouts.main-footer')
    </div>
  </div>
</div>
</div>

<!--=================================
 footer -->



<!--=================================
 jquery -->
@include('layouts.footer')
<!-- jquery -->


</body>
</html>
