<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        Wartosc minimalna: <input type="number" name="wart_min">
        Wartosc Maxymalna <input type="number" name="wart_max">
        informacja: <input type="text" name="informacja">
        <button name="submit" type="submit">DODAJ</button>
    </form>
    <table border="1">


        <?php


        $con = new mysqli("localhost", "root", "", "egzamin");
        if (isset($_POST['submit'])) {
            if (!empty($_POST['wart_min']) && ($_POST['wart_max']) && ($_POST['informacja'])) {
                $wart_min1 = $_REQUEST['wart_min'];
                $wart_max1 = $_REQUEST['wart_max'];
                $informacja1 = $_REQUEST['informacja'];
                $q = $con->prepare("INSERT INTO `bmi` (`id`, `wart_min`, `wart_max`, `informacja`) VALUES ('NULL',?,?,?);");
                $q->bind_param("iis", $wart_min1, $wart_max1, $informacja1);
                $q->execute();
            }
        }
        $q = $con->prepare("SELECT id, wart_min, wart_max, informacja FROM bmi");
        $q->execute();
        $result = $q->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $wart_min = $row['wart_min'];
            $wart_max = $row['wart_max'];
            $informacja = $row['informacja'];


            echo '<tr>';
            echo '<td>' . $id . '</td>';
            echo '<td>' . $wart_min . '</td>';
            echo '<td>' . $wart_max . '</td>';
            echo '<td>' . $informacja . '</td>';
            echo '</tr>';
        };




        $con->close();


  
        ?>
    </table>





</body>

</html>