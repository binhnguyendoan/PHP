<?php
$sql_products = "SELECT * FROM products ";
$query_products = mysqli_query($conn, $sql_products);

if (isset($_POST['sbm'])) {
    $prd_id = $_POST['id'];
    $prd_sku = $_POST['sku'];
    $prd_name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $prd_date = $_POST['create_date'];
    $prd_des = $_POST['description'];

    $sql = "INSERT INTO products (id,sku, name, image, create_date, description)
            VALUES ('$prd_id','$prd_sku', '$prd_name', '$image', '$prd_date', '$prd_des')";
    
    $query = mysqli_query($conn, $sql);
    move_uploaded_file($image_tmp, 'img/' . $image);
    header('location: index.php?page_layout=danhsach');
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-dark">
            <h2 class="text-center text-white">Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">SKU</label>
                    <input type="text" name="sku" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ngày tạo sản phẩm</label>
                    <input type="date" name="create_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select name="description" class="form-control" required>
                        <?php
                        while ($row_product = mysqli_fetch_assoc($query_products)) {
                            echo '<option value="' . $row_product['description'] . '">' . $row_product['description'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button name="sbm" class="btn btn-success mt-3">Thêm</button>
            </form>
        </div>
    </div>
</div>