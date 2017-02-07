<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Kontakt</title>
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--flagi-->
    <link href="./assets/docs.css" rel="stylesheet">
    <link href="./css/flag-icon.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> </head>
<!--/head-->

<body>
    <header id="header">
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"><span class="flag-icon flag-icon-pl"></span></a> <a href="#"><span class="flag-icon flag-icon-gb"></span></a> <a href="#"><span class="flag-icon flag-icon-de"></span></a> </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html#feature">Nawóz MaxCalc ST</a></li>
                        <li><a href="index.html#partner">Korzyści</a></li>
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>-->
                        <li><a href="index.html#partner1">Cechy MaxCalc ST</a></li>
                        <li class="active"><a href="contact-us.html">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->
    <section id="contact-info">
        <div class="center">
            <h2>Kontakt z nami</h2>
            <p class="lead">Poniżej podajemy informacje kontaktowe</p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2531.2336083981672!2d22.682317315737627!3d50.62277697949947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472330afbe0ef1f5%3A0x52616eb214107ddb!2sNiemir%C3%B3w+11%2C+23-440+Niemir%C3%B3w!5e0!3m2!1spl!2spl!4v1481909498431" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-sm-6 map-content">
                        <ul class="row">
                            <li class="col-sm-5"> <address>
							   <br /><br /><br /><br />
                                    <h5>Emar Sp. z o.o.</h5>
                                    <p>Niemirów 11 <br>
                                    23-440 Frampol</p>
                                    <p>Telefon:602-188-508 <br>
                                    Email: kontakt@nawozorganiczny.com.pl</p>
                                </address> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--/gmap_area -->
    <section id="contact-page">
        <div class="container">
            <div class="center">
                <h2>Napisz do nas</h2>
                <p class="lead">Prześlij nam swoją wiadomość. Postaramy się jak najszybciej odpowiedzieć na Twoje pytanie</p>
            </div>
            <div class="row contact-wrap">
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Imię *</label>
                            <input type="text" name="name" class="form-control" required="required"> </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required"> </div>
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="number" class="form-control"> </div>
                        <div class="form-group">
                            <label>Nazwa firmy</label>
                            <input type="text" class="form-control"> </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Temat *</label>
                            <input type="text" name="subject" class="form-control" required="required"> </div>
                        <div class="form-group">
                            <label>Treść wiadomości *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Wyślij</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#contact-page-->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"> &copy; 2016 <a target="_blank" href="http://kiro.pl/" title="Tworzymy strony www idealnie dopasowane">Kiro.pl</a>. All Rights Reserved. </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Do pobrania</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>

</html>