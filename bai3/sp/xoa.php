<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM products where id = $id";
    $query = mysqli_query($conn,$sql);
    header('location: index.php?page_layout=danhsach');
?>