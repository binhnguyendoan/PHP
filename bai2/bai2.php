<?php
    $userhost = "localhost:4306";
    $username = "root";
    $password = "";
    $userdb = "quanlysanphamdientu";

    $conn = mysqli_connect($userhost,$username,$password,$userdb);
   
    if($conn->connect_error){
        die("kết nối thất bại: " . $conn->connect_error);
    }
    $sql ="SELECT products.id, products.sku, products.name, products.image, products.create_date, GROUP_CONCAT(categories.name SEPARATOR ', ') AS categories
    FROM products
    LEFT JOIN categories ON FIND_IN_SET(categories.id, products.category_ids)
    GROUP BY products.id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo "<table>
                <tr>
                    <th >id</th>
                    <th >sku</th>
                    <th >Name</th>
                    <th >Image</th>
                    <th >create Date</th>
                    <th >Cat</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo " 
            <tr>
                <td>".$row["id"]."</td>
                <td>".$row["sku"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["image"]."</td>
                <td>".$row["create_date"]."</td>
                <td>".$row["categories"]."</td>
            </tr>";
                
            
        }
            
        echo   "</table>";
            
    }else{
        echo "không tìm thấy sản phẩm.";
    }
    


?>