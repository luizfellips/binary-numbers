<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binary Converter</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="form-box">
        <form action="index.php" method="POST">
            <h1>Insert a binary number to convert to decimal: </h1>
            <input class="form-input" type="number" name="binary" id="binary"
                oninput="this.value = this.value.replace(/[2-9]/g,'')" placeholder="110111" required>
            <div class="second-row">
                <button type="submit">Convert</button>
            </div>
        </form>
        <?php
        $binaryNumber = isset($_POST['binary']) ? $_POST['binary'] : 'RESULT';
        function toDecimal($binary)
        {
            $binaryString = strval($binary);
            $sum = 0;
            $currentBit = 0;
            $exponent = 1;
            for ($i = strlen((string)$binary) - 1; $i >= 0; $i--) {
                $currentBit = intval($binaryString[$i]);
                $currentBit *= $exponent;
                $sum += $currentBit;
                $exponent *= 2;
            }
            return "<h1 class='result'>$sum</h1>";
        }
        if ($binaryNumber == 'RESULT') {
            echo "<h1 class='result'>$binaryNumber</h1>";
        } else {
            echo toDecimal($binaryNumber);
        }

        ?>
    </div>
</body>

</html>