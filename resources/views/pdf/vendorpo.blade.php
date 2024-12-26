<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Generate PO</title>
    <style>
       /* A4 size in portrait mode */
       @page {
            margin: 0; 
            padding: 0 !important;
            height: 500px;
        }
        header {
          
        }

        footer {
          
        }
        main{
            margin-top: 60px;
            width: 100%; 
            padding: 0; 
        }
        .logo{
            font-size: 11px; 
            text-align: center; 
            margin-bottom: 15px; 
            display: block; 
            padding-bottom: 15px;
        }
        body{
            font-size: 10px;
            margin: 0px;
            padding: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo" style="border-bottom:1px solid #eee;">
            Nyka Events Private Limited
            <br>
        </div>
        
    </header>
    <br>
    <main>

        {!! $data !!}
    </main>
     <br>
     
      

    <footer style="position: absolute;border-top:1px solid #eee;bottom: 0;float: left;">
       <p style="font-size: 11px; text-align: center;"> Nyka Events Private Limited<br/>418-4<sup>th</sup> Floor, Hiren Light Industrial Estate, Mogul Lane, Mahim West, Mumbai 400016</p>
    </footer>
</body>
</html>