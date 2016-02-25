
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Custom styles for this template -->
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/carousel.css'); ?>
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">IMG</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <?php echo CHtml::link('Inicio', array('congreso/index'), array('style'=>'text-align: center')); ?>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu2"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Programa cientifico SOMIM<br>e IBEROMAT
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu2">
                                <li>
                                    <?php echo CHtml::link('Temas', array('congreso/temas')); ?>
                                </li>
                                <li><a href="#">La sociedad SOMIM e IBEROMAT</a></li>
                                <li><a href="#">Conferencias magistrales</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu2"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Envio<br>de articulos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu2">
                                <li><a href="#">Instrucciones ingreso al congreso</a></li>
                                <li><a href="#">Lineamientos</a></li>
                                <li><a href="#">Registro</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu2"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Registro<br>al congreso
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu2">
                                <li><a href="#">Cuotas</a></li>
                                <li><a href="#">Pida nombre</a></li>
                                <li><a href="#">Lineamientos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu3"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Información<br>general
<!--                                <span class="caret"></span>-->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu3">
                                <li><a href="#">Hotel sede</a></li>
                                <li><a href="#">Cuotas</a></li>
                                <li><a href="#">Descripción</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu3"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Sede
                                <!--                                <span class="caret"></span>-->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu3">
                                <li><a href="#">¿Cómo llegar?</a></li>
                                <li><a href="#">Transporte</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"
                               data-toggle="dropdown"
                               role="button"
                               id="menu3"
                               aria-haspopup="true"
                               aria-expanded="false"
                               style="text-align: center">Comité
                            </a>
<!--                            <ul class="dropdown-menu" aria-labelledby="menu3">-->
<!--                                <li><a href="#">Topicos</a></li>-->
<!--                                <li><a href="#">Another action</a></li>-->
<!--                                <li><a href="#">Something else here</a></li>-->
<!--                                <li role="separator" class="divider"></li>-->
<!--                                <li class="dropdown-header">Nav header</li>-->
<!--                                <li><a href="#">Separated link</a></li>-->
<!--                                <li><a href="#">One more separated link</a></li>-->
<!--                            </ul>-->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide"
                 src="<?php echo Yii::app()->baseUrl.'/images/16179731422_7606f23825_k.jpg'; ?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>SOMIM 2016</h1>
<!--                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>-->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide"
                 src="<?php echo Yii::app()->baseUrl.'/images/10066847454_ec50ad4305_k.jpg'; ?>" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>IBEROMAT 2016</h1>
<!--                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
<!--                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <?php echo $content; ?>
    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 SOMIM, A.C. &middot;</p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
