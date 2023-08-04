<?php
$id = $_GET['id'];
$sql_products = "SELECT * FROM products ";
$query_products = mysqli_query($conn, $sql_products);
$sql_up = "SELECT  * FROM products where id = $id ";
$query_up = mysqli_query($conn,$sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['edit'])) {
    $prd_id = $_POST['id'];
    $prd_sku = $_POST['sku'];
    $prd_name = $_POST['name'];
    if( $_FILES['image']['name'] == ''){
        $image = $row_up['name'];
    }else{
        $image = $row_up['name'];
    }
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $prd_date = $_POST['create_date'];
    $prd_des = $_POST['description'];

    $sql = "UPDATE  products SET sku = '$prd_sku' , name = '$prd_name' , image = '$image', create_date =  '$prd_date', description = '$prd_des' where id = $id";
    
    $query = mysqli_query($conn, $sql);

    header('location: index.php?page_layout=danhsach');
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-dark">
            <h2 class="text-center text-white">Sửa sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" class="form-control" required value="<?php echo $row_up['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="">SKU</label>
                    <input type="text" name="sku" class="form-control" required value="<?php echo $row_up['sku'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" required value="<?php echo $row_up['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Ngày tạo sản phẩm</label>
                    <input type="date" name="create_date" class="form-control" required
                        value="<?php echo $row_up['create_date'] ?>">

                </div>
                <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select name="description" class="form-control" required
                        value="<?php echo $row_up['description'] ?>">
                        <?php
                        while ($row_product = mysqli_fetch_assoc($query_products)) {
                            echo '<option value="' . $row_product['description'] . '">' . $row_product['description'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button name="edit" class="btn btn-success mt-3">Sửa</button>
            </form>
        </div>
    </div>
</div>