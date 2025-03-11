<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto venta</title>
</head>
<body>
    <ul>
        <?php foreach($data['usuarios'] as $usuario){?>
        <li><?php echo $usuario["nick"]; ?></li>
        <?php } ?>
    </ul>
</body>
</html>