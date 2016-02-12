<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <style type="text/css">
        body {
            min-height: 2000px;
            padding-top: 70px;
        }
        .accordion
        {
            max-width: 300px;
            margin: 5px auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo CHtml::link('SOMIM', array('/site/index'), array('class'=>'navbar-brand')); ?>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <?php echo Yii::app()->user->name; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo CHtml::link('Cerrar sesión', array('/auth/logout')); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-lg-2 sidebar">
                <div id='cssmenu'>
                    <ul>
                        <li class='has-sub'>
                            <a href='#'><span>Votaciones</span></a>
                            <ul>
                                <li>
                                    <?php echo CHtml::link('Preliminares', array('/votaciones/votar',
                                            'idetapa'=>'1')); ?>
                                </li>
                                <li>
                                    <?php echo CHtml::link('Definitivas', array('/votaciones/votar',
                                        'idetapa'=>'2')); ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- cssmenu -->
            </div>
            <div class="col-lg-10 main">
                <?php echo $content; ?>
            </div>
        </div><!-- row -->
    </div>


    <!-- Modal -->
<!--    <div id="myModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="height: 60%; with:70%" >-->
<!--        <div class="modal-header">-->
<!--            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
<!--            <h4 id="myModalLabel">Resguardo interno</h4>-->
<!--        </div>-->
<!--        <div class="modal-body" style="height: 80%; with:80%" >-->
<!--            <iframe src="" style="width:100%; height: 100%"></iframe>-->
<!--        </div>-->
<!--        <div class="modal-footer">-->
<!--            <button class="btn-primary" data-dismiss="modal">Cerrar</button>-->
<!--        </div>-->
<!--    </div>-->


    <script type="text/javascript">
//        $(function () {
//            $('.abrePdf').click(function () {
//                var url = $(this).attr("url");
//                //alert(url);
//                $('#myModal').on('show', function () {
//
//                    $('iframe').attr("src", url);
//
//                });
//                $('#myModal').modal({
//                    show: true
//                })
//            });
//        });
    </script>
</body>
</html>