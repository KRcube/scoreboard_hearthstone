<?php

const PATH = "/Applications/Hearthstone/Logs/Power.log";

function __autoload($name) {
    include 'class/'.$name.'.php';
}

?>

<!DOCTYPE html>
<html style="height:100%;">
<head>
    <meta charset="UTF-8">
    <title>Winning-or-losing-Hearthstone</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/bootstrap-grid.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body style="height:100%;">
    <div class="container" style="height:100%;">
        <div class="row h-100">
                <div class="col-sm-12 my-auto">
                    <div class="card card-block" style="text-align:center">
                        <div class="row" style="font-size:6em;">
                                <div class="col">
                                    <div style="font-size:0.8em;">승리</div>
                                    <div><?php Printer::printWonCount() ?></div>
                                </div>
                                <div class="row" style="margin-top: 105px;">
                                    <div>:</div>
                                </div>
                                <div class="col">
                                    <div style="font-size:0.8em;">패배</div>
                                    <div><?php Printer::printLostCount() ?></div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script>
        var gameCount = <?php echo(Printer::printAllCount()."; \n"); ?>

        function runRefresh() {
            $(document).ready(function(){
                $.ajax({
                    url:'./IsRunCheck.php',
                    success:function(data)
                    {
                        if(data != gameCount) {
                            location.reload();
                        } else {
                            console.log("불발");
                        }
                    }
                });
            }); 
        }

        setInterval("runRefresh()", 1000);
    </script>
</body>
</html>