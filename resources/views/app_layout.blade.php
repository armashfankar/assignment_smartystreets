<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>

        <!-- Begin Bootstrap CSS-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- End Bootstrap CSS-->
        
        <!-- Begin Custom CSS-->
        <link rel="stylesheet" type="text/css" href="/assets/style.css">
        <!-- End Custom CSS-->

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body data-col="2-columns">
        
        <div class="app-content content">
            <div class="content-wrapper">
                <!-- main content area starts -->
                @yield('content')
                <!-- main content area ends -->
            </div>
        </div>

        <!-- Begin Bootstrap JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        <!-- End Bootstrap JS-->
        
        <!-- Begin Custom JS -->
        @yield('script')
        <!-- End Custom JS -->
    </body>
</html>
