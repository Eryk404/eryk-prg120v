<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting Form</title>
</head>
<body>
    <h1>Greeting Form</h1>
    <form method="POST" action="">
        <label for="fornavn">Fornavn:</label>
        <input type="text" id="fornavn" name="fornavn" required>
        <br>
        <label for="etternavn">Etternavn:</label>
        <input type="text" id="etternavn" name="etternavn" required>
        <br>
        <input type="submit" value="Send">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        
        print("God dag $fornavn $etternavn <br />");
    }
    ?>
</body>
</html>
