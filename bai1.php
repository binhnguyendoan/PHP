<?php
function createArray($n) {
    $arr = array(); // Khởi tạo mảng rỗng
    $a = array();

    for ($i = 0; $i < $n; $i++) {
        if ($i % 2 == 0) {
            if ($i == 0) {
                $a[$i] = 2;
            } else {
                $a[$i] = $a[$i - 2] - 0.5;
            }
        } else {
            $a[$i] = -1;
        }
    }

    return $a;
}

$result = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['n'])) {
        $n = intval($_POST['n']);

        $result = createArray($n);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>

<body>
    <form action="" method="post" autocomplete="off">
        <label for="n">Nhập giá trị n:</label>
        <input type="number" id="n" name="n" required>
        <input type="submit" value="Tạo mảng">
    </form>

    <?php
    if (!empty($result)) {
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
    ?>
</body>

</html>