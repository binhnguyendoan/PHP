<!-- <div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-dark">
            <h2 class="text-center text-white">Danh sách sản phẩm</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>sku</th>
                        <th>name</th>
                        <th>image</th>
                        <th>create_date</th>
                        <th>categories</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT products.id,products.sku,products.name,products.image,products.create_date,products.description
                     FROM products";
                    $query = mysqli_query($conn, $sql);                    
                    while ($row = mysqli_fetch_assoc($query)) {?>


                    <tr>
                        <td><?php echo  $row['id'];  ?></td>
                        <td><?php echo  $row['sku'];  ?></td>
                        <td><?php echo  $row['name']; ?></td>
                        <td>
                            <img src="img/<?php echo  $row['image']  ?>" alt="Product Image" width="100px">
                        </td>;
                        <td><?php echo  $row['create_date']; ?></td>
                        <td><?php echo  $row['description']; ?></td>

                        <td>
                            <a href="index.php?page_layout=sua&id= <?php echo $row['id']; ?>">Sửa</a>

                        </td>

                        <td>
                            <a onclick=" return del('<?php echo $row['name']; ?>')"
                                href="index.php?page_layout=xoa&id= <?php echo $row['id']; ?>">Xóa</a>

                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example " class="d-flex align-items-center justify-content-center mt-5">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            <div class="button text-center">
                <a href="index.php?page_layout=them" class="btn btn-dark ">Thêm mới sản phẩm</a>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var pageSize = 5; // Số lượng sản phẩm trên mỗi trang
    var currentPage = 1; // Trang hiện tại

    loadData(currentPage); // Load dữ liệu ban đầu

    function loadData(page) {
        $.ajax({
            url: "getdata.php",
            type: "POST",
            data: {
                page: page,
                pageSize: pageSize
            },
            success: function(response) {
                var data = JSON.parse(response);

                // Hiển thị danh sách sản phẩm
                var tableBody = "";
                for (var i = 0; i < data.records.length; i++) {
                    var row = data.records[i];
                    tableBody += "<tr>";
                    tableBody += "<td>" + row.id + "</td>";
                    tableBody += "<td>" + row.sku + "</td>";
                    tableBody += "<td>" + row.name + "</td>";
                    tableBody += "<td><img src='img/" + row.image +
                        "' alt='Product Image' width='100px'></td>";
                    tableBody += "<td>" + row.create_date + "</td>";
                    tableBody += "<td>" + row.description + "</td>";
                    tableBody += "<td><a href='index.php?page_layout=sua&id=" + row.id +
                        "'>Sửa</a></td>";
                    tableBody += "<td><a onclick='return del(\"" + row.name +
                        "\")' href='index.php?page_layout=xoa&id=" + row.id + "'>Xóa</a></td>";
                    tableBody += "</tr>";
                }
                $("table").html(tableBody);

                // Tạo nút phân trang
                var pagination = "";
                var totalPages = Math.ceil(data.totalRecords / pageSize);
                for (var page = 1; page <= totalPages; page++) {
                    pagination += "<li class='page-item" + (page === currentPage ? " active" : "") +
                        "'>";
                    pagination += "<a class='page-link' href='#' data-page='" + page + "'>" + page +
                        "</a>";
                    pagination += "</li>";
                }
                $(".pagination").html(pagination);
            }
        });
    }

    // Sự kiện click vào các nút phân trang
    $(document).on("click", ".pagination li a", function(e) {
        e.preventDefault();
        var page = $(this).data("page");
        currentPage = page;
        loadData(page);
    });

    function del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
    }
});
</script>
</script> -->

<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header bg-dark">
            <h2 class="text-center text-white">Danh sách sản phẩm</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>sku</th>
                        <th>name</th>
                        <th>image</th>
                        <th>create_date</th>
                        <th>categories</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $pageSize = 3;
                    $start = ($page - 1) * $pageSize;
                    
                    $sql = "SELECT products.id,products.sku,products.name,products.image,products.create_date,products.description
                    FROM products LIMIT $start, $pageSize";
                    $query = mysqli_query($conn, $sql);                    
                    while ($row = mysqli_fetch_assoc($query)) {?>
                    <tr>
                        <td><?php echo  $row['id'];  ?></td>
                        <td><?php echo  $row['sku'];  ?></td>
                        <td><?php echo  $row['name']; ?></td>
                        <td>
                            <img src="img/<?php echo  $row['image']  ?>" alt="Product Image" width="100px">
                        </td>
                        <td><?php echo  $row['create_date']; ?></td>
                        <td><?php echo  $row['description']; ?></td>
                        <td>
                            <a href="index.php?page_layout=sua&id=<?php echo $row['id']; ?>">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return del('<?php echo $row['name']; ?>')"
                                href="index.php?page_layout=xoa&id=<?php echo $row['id']; ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php
            $sql = "SELECT COUNT(*) AS totalRecords FROM products";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $totalRecords = $row['totalRecords'];
            $totalPages = ceil($totalRecords / $pageSize);

            if ($totalPages > 1) {
                echo '<nav aria-label="Page navigation example" class="d-flex align-items-center justify-content-center mt-5">';
                echo '<ul class="pagination">';

                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item' . ($page == $i ? ' active' : '') . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($page < $totalPages) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 1) . '">Next</a></li>';
                }

                echo '</ul>';
                echo '</nav>';
            }
            ?>

            <div class="button text-center">
                <a href="index.php?page_layout=them" class="btn btn-dark">Thêm mới sản phẩm</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function del(name) {
    return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
}
</script>