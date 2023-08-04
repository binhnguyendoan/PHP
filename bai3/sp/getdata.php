<?php
// Kết nối tới cơ sở dữ liệu và lấy dữ liệu từ bảng sản phẩm
$conn = mysqli_connect("localhost", "username", "password", "database_name");
$page = $_POST['page']; 
$start = ($page - 1) * $limit; // Vị trí bắt đầu của dữ liệu trong cơ sở dữ liệu

// Truy vấn lấy danh sách sản phẩm cho trang hiện tại
$sql = "SELECT * FROM products LIMIT $start, $limit";
$query = mysqli_query($conn, $sql);

// Hiển thị danh sách sản phẩm
while ($row = mysqli_fetch_assoc($query)) {
    echo "<p>" . $row['name'] . "</p>";
}

// Tính tổng số trang
$total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$pages = ceil($total / $limit);

// Hiển thị các nút phân trang
echo "<ul class='pagination'>";
for ($i = 1; $i <= $pages; $i++) {
    echo "<li><a href='#' id='" . $i . "'>" . $i . "</a></li>";
}
echo "</ul>";
?>