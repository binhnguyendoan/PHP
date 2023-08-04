<?php
    require_once './cf/db.php';
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Thực hành 2 </title>
</head>

<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'danhsach':
                    require_once './sp/danhsach.php';
                    break;
                case 'them':
                    require_once './sp/them.php';
                    break;
                case 'sua':
                    require_once './sp/sua.php';
                    break;
                case 'xoa':
                    require_once './sp/xoa.php';
                    break;
                default:
                    break;
                    
            }
        }else{
            require_once './sp/danhsach.php';
        }
    ?>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>