<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template-free">

  {{-- Head --}}
  @include('layouts.head')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        {{-- Sidebar Menu --}}
        @include('layouts.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          
          {{-- Top Nav Bar --}}
          @include('layouts.topnav')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            
            
            {{-- Main Content --}}
            @section('main')
                
            @show

            {{-- Footer --}}
            @include('layouts.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    @include('layouts.js')
    <script src="assets/plugins/typedjs.bundle.js"></script>
    
  </body>
</html>
