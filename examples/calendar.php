<?php
    $code1 = htmlspecialchars(file_get_contents('./calendar1.php'));
    $code2 = htmlspecialchars(file_get_contents('./calendar2.php'));
    $code3 = htmlspecialchars(file_get_contents('./calendar3.php'));
    $code4 = htmlspecialchars(file_get_contents('./calendar4.php'));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar QR Code Demonstration</title>
    <style type="text/css" rel="stylesheet">
        html * {
            margin: 0;
        }

        body {
            height: 100%;
            width: 100%;
        }

        .example {
            width: 20%;
            margin: 20px 10px;
            display: inline-block;
            *display: inline;
            vertical-align: top;
        }
        .example h3 > small {
            color: gainsboro;
        }
        .example pre {
            overflow-x: auto;
        }
        .example img {
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="example">
        <h3>Example 1<br><small>Error Correction Level - L</small><br>
            <small>Pixel Size - 4</small><br>
            <small>Margin - 4</small></h3>
        <pre><?php echo $code1; ?></pre>
        <img src="calendar1.php">
    </div>

    <div class="example">
        <h3>Example 2<br><small>Error Correction Level - M</small><br>
            <small>Pixel Size - 2</small><br>
            <small>Margin - 2</small></h3>
        <pre><?php echo $code2; ?></pre>
        <img src="calendar2.php" alt="QR Code">
    </div>

    <div class="example">
        <h3>
            Example 3<br>
            <small>Error Correction Level - Q</small><br>
            <small>Pixel Size - 4</small><br>
            <small>Margin - 4</small>
        </h3>
        <pre><?php echo $code3; ?></pre>
        <img src="calendar3.php" alt="QR Code">
    </div>

    <div class="example">
        <h3>Example 4<br><small>Error Correction Level - H</small><br>
            <small>Pixel Size - 6</small><br>
            <small>Margin - 4</small></h3>
        <pre><?php echo $code4; ?></pre>
        <img src="calendar4.php" alt="QR Code">
    </div>

</body>
</html>