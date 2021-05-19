<?php
    include('koneksi.php');
 
    $sensor = $_GET['tinggi_air'];
 
    $sql = "INSERT INTO tbl_water (tinggi_air) VALUES (:tinggi_air)";
 
    $stmt = $PDO->prepare($sql);
 
    $stmt->bindParam(':tinggi_air', $sensor);


    if($stmt->execute()) {
        echo "data berhasil ditambahkan";
    }else{
        echo "data gagal ditambahkan";
    }
?>