<head>
<title>PHP Tips</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

<link rel="stylesheet" href="styles.css">
</head>

<?php
    $subTCol = NULL;
    $subT = NULL;
    $tipV = NULL;
    $tipCol = NULL;
    $tipP = NULL;
    $split = NULL;
    $splitCol = NULL;
    $tipC = NULL;
    $tip1Ch = NULL;
    $tip2Ch = NULL;
    $tip3Ch = NULL;
    $tipCCh = NULL;
    if (isset($_POST['submit'])) {
        $subT = $_POST['subT'];
        if ($subT == NULL || $subT <= 0) {
            $subTCol = 'style="color: red;"';
        }
        $tipP = $_POST['tipP'];
        $tipV = 0;
        $tipC = $_POST['cT'];
        switch ($tipP) {
            case "r1":
                $tipV = 10;
                $tip1Ch = 'checked="checked"';
                break;
            case "r2":
                $tipV = 15;
                $tip2Ch = 'checked="checked"';
                break;
            case "r3":
                $tipV = 20;
                $tip3Ch = 'checked="checked"';
                break;
            case "rC":
                $tipV = $_POST['cT'];
                $tipCCh = 'checked="checked"';
                break;
            default:
                break;
        }
        
        if ($tipV == NULL || $tipV <= 0) {
            $tipCol = 'style="color: red;"';
        }
        
        $split = $_POST['split'];
        
        if ($split == NULL || $split <= 0) {
            $splitCol = 'style="color: red;"';
        }

    }
    ?>

<body>
<h1 align="center">PHP Tips</h1>
<form action="calc.php" method="post">
<div align="center" class="row">
<div class="col-sm-3">
<p align="left" <?php echo $subTCol; ?>>Bill subtotal: $</p>
</div>
<div class="col-sm-9">
<input type="number" class="form-control" name="subT" id"subT" placeholder="Enter subtotal" <?php echo $subTCol; ?> value=<?php echo '"' . $subT . '"'; ?>>
</div>
</div>
<div align="center" class="row">
<div class="col-sm-3">
<p align="left" <?php echo $tipCol; ?>>Tip Percentage:</p>
</div>
</div>
<div align="center" class="row">
<div align="left" class="col-sm-12">
<?php
    for ($x = 1; $x <= 3; $x++) {
        echo '<label class="radio-inline" ' . $tipCol . '><input type="radio" name="tipP" value="r' . $x . '" ';
        switch ($x) {
            case 1:
                echo $tip1Ch;
                break;
            case 2:
                echo $tip2Ch;
                break;
            case 3:
                echo $tip3Ch;
                break;
            default:
                break;
        }
        echo '>' . (5 * ($x + 1)) . '%</label>';
    }
    ?>
</div>
</div>
<div align="center" class="row">
<div align="left" class="col-sm-2">
<label align="left" class="radio-inline" <?php echo $tipCol; ?>><input type="radio" name="tipP" value="rC" <?php echo $tipCCh; ?>>Custom %:</label>
</div>
<div align="left" class="col-sm-10">
<input type="number" class="form-control" <?php echo $tipCol; ?> placeholder="Enter percentage" name="cT" id"cT" value=<?php echo '"' . $tipC . '"'; ?>>
</div>
</div>
<div align="center" class="row">
<div class="col-sm-1">
<p align="left" <?php echo $splitCol; ?>>Split:</p>
</div>
<div class="col-sm-9">
<input type="number" class="form-control" placeholder="Enter split" name="split" id"split" <?php echo $splitCol; ?> value=<?php echo '"' . $split . '"'; ?>>
</div>
<div class="col-sm-1">
<p align="left">person(s)</p>
</div>
</div>
<div align="center" class="row">
<input type="submit" class="btn btn-primary" name="submit" value="Submit">

</div>
</form>


<?php
    if (isset($_POST['submit'])) {
        if ($subT == NULL || $subT <= 0) {
            return;
        }
        
        if ($tipV == NULL || $tipV <= 0) {
            return;
        }
        
        if ($split == NULL || $split <= 0) {
            return;
        }
        
        setlocale(LC_MONETARY, 'en_US');
        $tipT = money_format('%(#1n', ($subT * $tipV) / 100) . "\n";
        $total = money_format('%(#1n', (($subT * $tipV) / 100) + $subT) . "\n";
        
        echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Tip: ' .$tipT. '</p></div></div>';
        
        echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Total: ' .($total). '</p></div></div>';
        
        
        if ($split != 1) {
            $sTipT = money_format('%(#1n', (($subT * $tipV) / 100) / $split) . "\n";
            $sTotal = money_format('%(#1n', ((($subT * $tipV) / 100) + $subT) / $split) . "\n";
            
            echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Tip each: ' .$sTipT. '</p></div></div>';
            
            echo '<div align="center" class="row"><div class="col-sm-3"><p align="left">Total each: ' .($sTotal). '</p></div></div>';
        }
    }
    
    
    ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
