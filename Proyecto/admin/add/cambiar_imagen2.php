<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    
    <form method="post" enctype="multipart/form-data">
          
            <span>Imagen:</span><input type="file" name="bird" id="pajaro" required />
            <img src='<?php echo '../add/'.$imagen; ?>' /><br><br>               
            <br><span><input type="submit" value="Enviar" /></span><br><br>
        </form>
    
    <?php
    
    var_dump($imagen);
    
    ?>
    
</body>
</html>
