<?php
    if (isset($_GET['submit'])) {
        $subT = htmlentities($_GET['subT']);
        if ($subT == NULL) {
            echo "hi";
            return;
        }
        $tipP = $_GET['tipP'];
        $tipV = 0;
        switch ($tipP) {
            case "r1":
                $tipV = 10;
                break;
            case "r2":
                $tipV = 15;
                break;
            case "r3":
                $tipV = 20;
                break;
            case "rC":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
                return;
        }
        
        setlocale(LC_MONETARY, 'en_US');
        $tipT = money_format('%(#1n', ($subT * $tipV) / 100) . "\n";
        $total = money_format('%(#1n', (($subT * $tipV) / 100) + $subT) . "\n";
        
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous"><link rel="stylesheet" href="styles.css">';
        
        echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Tip: ' .$tipT. '</p></div></div>';
        
        echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Total: ' .($total). '</p></div></div>';
        
        $split = $_GET['split'];
        
        if ($split <= 0) {
            echo 'hi';
            return;
        }
        if ($split != 1) {
            $sTipT = money_format('%(#1n', (($subT * $tipV) / 100) / $split) . "\n";
            $sTotal = money_format('%(#1n', ((($subT * $tipV) / 100) + $subT) / $split) . "\n";
            
            echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Tip each: ' .$sTipT. '</p></div></div>';
            
            echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Total each: ' .($sTotal). '</p></div></div>';
        }
        
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>';
    }
    

    ?>
