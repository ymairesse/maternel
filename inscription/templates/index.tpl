<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ISND - MATERNEL Demande d'inscription</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    	<link rel="stylesheet" href="screen.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="bootstrap/fa/css/font-awesome.min.css" type="text/css" media="screen, print">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

    	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.fr.min.js" charset="UTF-8"></script>

    	<script type="text/javascript" src="js/bootbox.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jsCookie/src/js.cookie.js"></script>

        <style media="screen">
            #top {
                overflow: hidden;
                background-image: url("images/cropped-5.png");
                background-repeat: no-repeat;
                background-size: cover;
                height: 560px;
                resize: vertical;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12" id="top">
                    <button type="button" class="btn btn-success btn-xs" id="btn-ViewMinus"><i class="fa fa-arrow-up"></i></button>
                    <button type="button" class="btn btn-warning btn-xs" id="btn-ViewPlus"><i class="fa fa-arrow-down"></i></button>
                </div>

                <div id="corpsPage">
                    {include file="{$corpsPage}.tpl"}
                </div>
            </div>
        </div>

    </body>

<script type="text/javascript">

    var topHeight = Cookies.get('topHeight');
    $('#top').height(topHeight);

    $(document).ready(function(){

        $('#btn-ViewMinus').click(function(){
            var top = document.getElementById("top");
            var height = top.offsetHeight - 20;
            if (height > 20) {
                $('#top').height(height);
                Cookies.set('topHeight', height, { sameSite: 'strict' } );
            }
        })

        $('#btn-ViewPlus').click(function(){
            var top = document.getElementById("top");
            var height = top.offsetHeight + 20;
            if (height < 520) {
                $('#top').height(height);
                Cookies.set('topHeight', height, { sameSite: 'strict' } );
            }
        })

    })

</script>

</html>
