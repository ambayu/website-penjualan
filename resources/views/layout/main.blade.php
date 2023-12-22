<!DOCTYPE html>
<html lang="en">
    @include('template.head')
    <!-- body -->
    
    <body class="main-layout">
        <!-- loader  -->
        <div class="loader_bg">
            <div class="loader"><img src="/images/loading.gif" alt="" /></div>
        </div>
        
    <div class="wrapper">
        <!-- end loader -->
        
     
    @include('partials.sidebar')

        <div id="content">
            
            <!-- header -->
    @include('partials.navbar')
    <!-- end header -->
    <!-- start slider section -->
    @yield('all-of-us')
    <!-- footer -->
    @include('template.footer')

</div>
    </div>
    <div class="overlay"></div>
    @include('partials.javascript')
    
    
    
</body>

</html>