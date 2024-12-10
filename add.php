<?php 

     include"connect.php";

     if(isset($_POST['add'])){
        $Họ_và_tên = $_POST['fullname'];
        $Ngày_sinh = $_POST['dob'];
        $Giới_tính = $_POST['gender'];
        $Quê_quán = $_POST['hometown'];
        $Trình_độ_học_vấn = $_POST['level'];
        $Nhóm = $_POST['group'];

        $sql="INSERT INTO `table_students`( fullname, dob, gender, hometown, level, `group`)
        VALUE('$Họ_và_tên', '$Ngày_sinh', '$Giới_tính', '$Quê_quán','$Trình_độ_học_vấn','$Nhóm')";

        mysqli_query($conn, $sql);
        header('location: index.php');
     }

?>


<form action="add.php" method="post" enctype="multipart/form-data">
    <p> Họ và tên </p>
    <input type="text" name="fullname">

    <p>Ngày sinh</p>
    <input type="date" name="dob">

    <p>Giới tính</p>
    <input type="radio" id="male" name="gender">
    <label for="male">Nam</label>
    <input type="radio" id="female" name="gender">
    <label for="female">Nữ</label><br>

    <p>Quê quán</p>
    <input type="text" name="hometown">

    <p>Trình độ học vấn</p>
    <select id="level" name="level" required>
        <option value="0">Tiến sĩ</option>
        <option value="1">Thạc sĩ</option>
        <option value="2">Kỹ sư</option>
        <option value="3">Khác</option>
    </select><br>

    <p>Nhóm</p>
    <input type="text" name="group">

    <br><br>
    <button id="submit" name="add">Lưu</button>
</form>