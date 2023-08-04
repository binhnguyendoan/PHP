<?php

// Lấy thông tin trang và số lượng sản phẩm trên mỗi trang từ yêu cầu Ajax
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$pageSize = isset($_POST['pageSize']) ? $_POST['pageSize'] : 5;

// Tính toán vị trí bắt đầu và số lượng sản phẩm cần lấy
$start = ($page - 1) * $pageSize;
$end = $start + $pageSize;

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$query = "SELECT * FROM products LIMIT $start, $pageSize";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Truy vấn cơ sở dữ liệu để lấy tổng số lượng sản phẩm
$query = "SELECT COUNT(*) AS totalRecords FROM products";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['totalRecords'];

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);

// Tạo mảng chứa dữ liệu sản phẩm và tổng số lượng sản phẩm
$data = [
    'records' => $products,
    'totalRecords' => $totalRecords
];

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);