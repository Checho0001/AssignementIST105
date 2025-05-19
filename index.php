<?php
// Procesar el formulario si los datos están definidos
$output = "";

if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
    $a = floatval($_GET['a']);
    $b = floatval($_GET['b']);
    $c = floatval($_GET['c']);

    // Escapar los valores para shell_exec
    $a_escaped = escapeshellarg($a);
    $b_escaped = escapeshellarg($b);
    $c_escaped = escapeshellarg($c);

    // Llamar al script Python
    $command = "python3 calculo.py $a_escaped $b_escaped $c_escaped";
    $output = shell_exec($command);
}
?>

<!DOCTYPE html>
<html lang="en">>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python + PHP calculator</title>
</head>
<body>
    <h1>Calculate: b + <span>&#8730;</span><span  style="border-top: 1px solid black">c<sup>3</sup></span>  / a × 10</h1>

    <form method="get">
        <label for="a">Valor de a:</label>
        <input type="number" name="a" id="a" step="any" required><br><br>

        <label for="b">Valor de b:</label>
        <input type="number" name="b" id="b" step="any" required><br><br>

        <label for="c">Valor de c:</label>
        <input type="number" name="c" id="c" step="any" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <hr>

    <!-- Mostrar el resultado -->
    <div>
        <?php echo $output; ?>
    </div>
</body>
</html>