<html lang="en">
    <head>
        <title>CUSTOMER DETAILS</title>

      <script type="text/javascript" src="{{URL::asset('js/jqueryv3.min.js')}}"></script> 
        
      <script type="text/javascript" src="{{URL::asset('js/bootstrapv3.min.js')}}"></script>

      <script type="text/javascript" src="{{URL::asset('js/jquery-ui.min.js')}}"></script>
        
      <script type="text/javascript" src="{{URL::asset('js/datatables.min.js')}}"></script>
        
      <link rel="stylesheet" href="{{URL::asset('css/bootstrapv3.min.css')}}" type="text/css"/>

      <link rel="stylesheet" href="{{URL::asset('css/jquery-ui.min.css')}}" type="text/css"/>
        
      <link rel="stylesheet" href="{{URL::asset('css/webfonts.css')}}" type="text/css"/>    

       <link rel="stylesheet" href="{{URL::asset('css/datatables.min.css')}}" type="text/css"/>      
        
        <!--  <link rel="stylesheet" href="{{URL::asset('css/select2.css')}}" type="text/css"/> -->


       <!-- CRUD JS -->
        <script type="text/javascript" src="{{URL::asset('js/forms/customer_form.js')}}"></script> 

        <style>
          /* @import url("https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");*/
          /* @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans');*/
              /* @import url("https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");*/
          /* @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans');*/
            
            .glyphicon {
              position: relative;
              top: 1px;
              display: inline-block;
              font-family: 'Glyphicons Halflings';
              font-style: normal;
              font-weight: normal;
              line-height: 1;

              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
            }

            .glyphicon-asterisk:before {
              content: "\2a";
            }

            body {
                font-family: 'Open Sans', sans-serif;
                font-family: 'Montserrat', sans-serif;
            }

          

        
            
        </style>

            <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

   <body class="">
        <div class="container-fluid">
            <div class="row bg-danger">
                <div class="col-lg-12">
                   <!-- <div class="header"> -->
                        <div class="pull-left">
                             <h4>CUSTOMER DETAILS</h4>
                        </div>
                        <div class="pull-right">
                            
                                    <a class="btn btn-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                        </div>
                   <!--  </div> -->
                </div>
            </div>           
            @yield('content')
        </div>
    </body>
</html>