<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
      <title>Compliance Safety Manager</title>
      <!-- Scripts -->
      <!-- <script src="{{ asset('js/app.js') }}" defer></script>-->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100&display=swap"
         rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{asset('data/admin/images/favicon.png')}}" />
      <style>
         * {
         font-family: 'Montserrat', sans-serif !important;
         }
         .login-bg-top {
    background: #ffffff;
    display: flex;
    justify-content: left;
    width: 100%;
}
 .login-bg-top .logo{
            padding-top: 30px;
    padding-left: 75px;
         }
         .login-bg-top .logo img{
            width: 100%; 
         }
         .login-bg{
         background: #ffffff;
         display: flex;
         justify-content: center;
         height: 100vh;
         width: 100%;
             align-items: center;
         }
         .login-box{
        box-shadow: #0000001f 0px 1px 23px;
    border-radius: 8px;
    margin-top: -42%; 
         }
         .login-bg .logo{
               padding-top: 20px;  
         }
         .login-bg .logo img{
            width: 100%; 
         }
         .login-box .box-top{
         /*background: #1C2E46;*/
         background: #1c2e46c4;
         display: flex;
         padding: 40px 20px 110px 20px;    align-items: center;border-radius: 40px;
         justify-content: center;
         }
         .login-box .box-bottom{
         background: #fff;
         display: flex;
         padding:40px 30px 45px 30px;
         align-items: center;
         border-radius: 40px;
         margin-top: -75px;
         }
         .login-box .box-top h2{
         color: #fff;
         font-size: 22px;    margin-bottom: 0;
         }
         .login-box .box-top .text{
         width: 80%;
         text-align: left;
         }
         .login-box .box-top .icon{
         width: 20%;
         text-align: right;
         }
         .login-box .box-bottom .form-input{
         position: relative;
         margin-bottom: 20px;
         }
         .login-box .box-bottom .form-input .icons{
         position: absolute;
         z-index: 9;
         top: 45px;
         font-size: 20px;
         left: 20px;
         color: #848484;
         }
         .login-box .box-bottom .form-input input{
            width: 100%;
    background: #ffffff;
    border: none;
    font-size: 14px;
    padding: 15px 20px 15px 20px;
    border-radius: 5px;
    height: 52px;
    border: 1px solid #dfdfdf;
         }
        .login-box .form-control:focus {
    color: #212529;
    background-color: #fff !important;
    border-color: #e3e3e3 !important;
    outline: 0;
    box-shadow: none;
}
         .login-box .box-bottom label{
         font-weight: 500;
         padding-bottom: 10px;
         }
         .login-box .box-bottom .form-input .join-room{
         position: absolute;
         z-index: 9;
         top: 12px;
         font-size: 14px;
         right: 12px;
         color: #303030;
         background: #fff;
         padding: 4px 20px;
         font-weight: 500;
         border-radius: 50px;
         height: 28px;
         }
         .but-login{
    background: #c7c7c7;
    border: none;
    color: #e20613;
    font-size: 15px;
    padding: 18px 35px;
    border-radius: 3px;
    float: right;
    font-weight: 600;
    width: 100%;
         }    
         @media (min-width: 1200px)
         {
         .container, .container-lg, .container-md, .container-sm, .container-xl {
         max-width: 1280px;
         }
         }
      </style>
   </head>
   <body>
      <div id="app">
         <main class="">
            @yield('content')
         </main>
      </div>
   </body>
</html>