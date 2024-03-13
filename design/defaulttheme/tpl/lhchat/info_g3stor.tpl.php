<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Cliente</title>

    <style>
        <?php include 'design/defaulttheme/css/g3stor.css'; ?>
    </style>
</head>

<body>
    <div>
        <?php
        if (!empty($infos)) {
            echo "<table class=\"table table-hover table-sm\">";
            foreach ($infos as $key => $value) {
                if ($value !== null) {
                    $palavra = substr($key, strpos($key, "_") + 1);
                    $value = htmlspecialchars($value);
                    echo "<tr><td><h3>$palavra:</h3></td><td>$value</td></tr>";
                }
            }
            echo "</table>";
        } else {
            echo "<h1>O cliente não está com telefone cadastrado.</h1>";
        }
        ?>
    </div>

</body>

</html>
