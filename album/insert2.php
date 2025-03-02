<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>ฟอร์มเพิ่มข้อมูลสินค้า</title>
</head>

<body>

    <h1>ฟอร์มเพิ่มข้อมูลสินค้า</h1>
    
    <form method="post" action="" enctype="multipart/form-data">
        ชื่อสินค้า: <input type="text" name="pname" required autofocus> <br>
        ราคา: <input type="text" name="pprice" required> <br>
        รายละเอียดสินค้า: <textarea name="pdrice" rows="5" cols="40" required></textarea> <br>
        รูปภาพสินค้า: <input type="file" name="pimage" accept="image/*" required> <br>
        <button type="submit">บันทึก</button>
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

</body>
</html>