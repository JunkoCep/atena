<!DOCTYPE html>
<html>
<head>
    <title>Generador de Contraseñas</title>
</head>
<body>
    <h1>Generador de Contraseñas</h1>

    <form method="post">
        <label for="length">Longitud de la contraseña:</label>
        <input type="number" name="length" min="6" max="20" value="8" required>
        <br>
        <input type="checkbox" name="uppercase" id="uppercase">
        <label for="uppercase">Incluir letras mayúsculas</label>
        <br>
        <input type="checkbox" name="lowercase" id="lowercase" checked>
        <label for="lowercase">Incluir letras minúsculas</label>
        <br>
        <input type="checkbox" name="numbers" id="numbers" checked>
        <label for="numbers">Incluir números</label>
        <br>
        <input type="checkbox" name="special_chars" id="special_chars">
        <label for="special_chars">Incluir caracteres especiales</label>
        <br>
        <input type="submit" value="Generar Contraseña">
    </form>

    <?php
    function generatePassword($length, $uppercase, $lowercase, $numbers, $special_chars) {
        $chars = '';
        if ($uppercase) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($lowercase) {
            $chars .= 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($numbers) {
            $chars .= '0123456789';
        }
        if ($special_chars) {
            $chars .= '!@#$%^&*()-_';
        }

        $password = '';
        $chars_length = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $random_char = $chars[rand(0, $chars_length - 1)];
            $password .= $random_char;
        }

        return $password;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $length = $_POST["length"];
        $uppercase = isset($_POST["uppercase"]);
        $lowercase = isset($_POST["lowercase"]);
        $numbers = isset($_POST["numbers"]);
        $special_chars = isset($_POST["special_chars"]);

        $password = generatePassword($length, $uppercase, $lowercase, $numbers, $special_chars);

        echo "<h2>Contraseña generada:</h2>";
        echo "<p>{$password}</p>";
    }
    ?>

</body>
</html>