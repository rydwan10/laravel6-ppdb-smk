<!DOCTYPE html>
<html lang="en">

<head>
     @include('template.partials._head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper" id="app">
          @include('template.partials._sidebar')
          @include('template.partials._navbar')

          <div class="content-wrapper">
               <div class="content-header">
                    <div class="container-fluid">
                         <div class="row mb-2">
                              <div class="col-sm-6">

                                  <h3> @yield('page_title')</h3>

                                   {{-- Start of summary --}}
                                        
                                   {{-- End of summary --}}
                              </div>
                         </div>
                    </div>
               </div>
               <section class="content">
                   <div class="container-fluid">
                         @yield('content')
                    </div>
               </section>
          </div>


     </div>

     {{-- @include('template.partials._footer') --}}
     @include('template.partials._scripts')
</body>

</html>