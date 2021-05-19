<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Sensor</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="data">
        <input type="submit" name="submit" value="Cari Data">
    </form>
 
    <?php
        include('koneksi.php');
 
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $dataWaktu = $_POST['data'];
            $sql = "SELECT * FROM tbl_water WHERE data_waktu LIKE '%" . $dataWaktu . "%'";
        }else{
            $dataActual = date('Y-m');
            $sql = "SELECT * FROM tbl_water WHERE data_waktu LIKE '%" . $dataActual . "%'";
        }
 
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        echo "<br>";
        echo "<table border=\"1\">";
        echo "<tr> <th>Tinggi Air</th>
                   <th>Waktu</th> </tr>";
        while ($tampil = $stmt->fetch(PDO::FETCH_OBJ)){
            $timestamp = strtotime($tampil->data_waktu);
            $dateTabel = date('d/m/Y H:i:s', $timestamp);
 
            echo "<tr>";
            echo "<td>" . $tampil->tinggi_air . "</td>";
            echo "<td>" . $dateTabel . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>