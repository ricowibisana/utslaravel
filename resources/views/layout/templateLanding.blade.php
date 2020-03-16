<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <title>Toko Bajuku</title>


</head>

<body style="background-color: #e6e6e6" id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            	<!-- top bar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: #1cc88a">
                    <div class="col-md-6" style="font-size: 18pt;" >
                            <style>
                                #aa:link {color: black; text-decoration: none;}
                                #aa:visited {color: black; text-decoration: none;}
                                #aa:hover {color: black; text-decoration: none;}
                                #aa:active {color: black; text-decoration: none;}
                            </style>
                            <a href="{{ url('welcome') }}" id="aa"> Toko Bajuku. </a>
                    </div>
                    <div class="col-md-6" >
                        <div style="float: right;">
                          <a href="{{ url('login') }}" class="btn" style="width: 150px; text-align: right;" >Login</a>
                          <a href="{{ url('register') }}" class="btn" style="width: 150px;" style="color: #ffff">Register</a>
                        </div>
                    </div>
                    <br>
                </nav>
                <!-- end top bar -->
            <!-- End Main Content -->

    @yield('content')

                <!-- footer -->
                 <footer class="sticky-footer">
                    <div class="container my-auto">
                      	<div class="copyright text-center my-auto">
                        	<span>Copyright &copy; Toko Bajuku 2020</span>
                            <br>
                            <br>
                      	</div>
                    </div>
                </footer>
                <!-- end footer -->

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
   <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
    <script src="index.js"></script>
</body>

</html>