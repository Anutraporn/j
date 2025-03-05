<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
<meta charset="utf-8">
<title>อนุตราพร ดอกไม้</title>
<html lang="en" data-bs-theme="auto">
  <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
</head>
    <h1>ฟอร์มเพิ่มข้อมูลสินค้า</h1>
    
    <form method="post" action="" enctype="multipart/form-data">
        ชื่อสินค้า: <input type="text" name="pname" required autofocus> <br>
        รายละเอียดสินค้า: <textarea name="pdrice" rows="5" cols="40" required></textarea> <br>
        ราคา: <input type="text" name="pprice" required> <br>
        แบรนด์: <input type="text" name="pbrand" required> <br>
        รูปภาพสินค้า: <input type="file" name="pimage" accept="image/*" required> <br>
        <button type="submit" class="btn btn-danger">บันทึก</button>
    </form>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-primary">ยกเลิก</button>
  <button type="button" class="btn btn-primary">หน้าแรก</button>
  <button type="button" class="btn btn-primary">ลบ</button>
</div>
    </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include_once("../connectdb.php");

    // รับค่าจากฟอร์ม
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    
    // ตรวจสอบและอัปโหลดไฟล์ภาพ
    if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == 0) {
        $file_tmp = $_FILES['pimage']['tmp_name'];
        $file_name = $_FILES['pimage']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // ตรวจสอบนามสกุลไฟล์ (เช่น jpg, jpeg, png, gif, webp)
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($file_ext, $allowed_extensions)) {
            // สร้างชื่อไฟล์ใหม่ตามรหัสสินค้า
            // คาดว่า id จะถูกเพิ่มแบบอัตโนมัติในฐานข้อมูล ดังนั้นจะตั้งชื่อไฟล์ไว้ก่อน
            $new_file_name = 'product_' . time() . '.' . $file_ext; // ใช้ timestamp เพื่อให้ชื่อไฟล์ไม่ซ้ำ

            // ตั้งโฟลเดอร์ที่จะเก็บภาพ
            $upload_dir = "../images/";

            // ตรวจสอบว่าโฟลเดอร์มีอยู่หรือไม่
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // ย้ายไฟล์จาก tmp ไปที่โฟลเดอร์
            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                // ไฟล์อัปโหลดสำเร็จ
                echo "อัปโหลดรูปภาพสำเร็จ: $new_file_name<br>";

                // Insert ข้อมูลสินค้า
                $sql = "INSERT INTO products (p_name, p_price, p_ext) VALUES ('{$pname}', '{$pprice}', '{$new_file_name}')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>";
                    echo "alert('เพิ่มข้อมูลสินค้าและอัปโหลดรูปภาพสำเร็จ');";
                    echo "</script>";
                } else {
                    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
                }
            } else {
                echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ!";
            }
        } else {
            echo "รูปภาพต้องเป็นไฟล์ประเภท .jpg, .jpeg, .png, .gif เท่านั้น!";
        }
    } else {
        echo "กรุณาเลือกไฟล์รูปภาพ!";
    }
}
?>
<body>
</body>
</html>
