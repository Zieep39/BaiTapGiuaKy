<?php
    include "connect.php";

    $this_id = $_GET['this_id'];
    echo $this_id;

    $sql = "SELECT * FROM `table_students` WHERE id = '$this_id'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);
    
    if(isset($_POST['edit'])){
  
        $Họ_và_tên = $_POST['fullname'];
        $Ngày_sinh = $_POST['dob'];
        $Giới_tính = $_POST['gender'];
        $Quê_quán = $_POST['hometown'];
        $Trình_độ_học_vấn = $_POST['level'];
        $Nhóm = $_POST['group'];

        $sql = "UPDATE `table_students` SET fullname='$Họ_và_tên', dob='$Ngày_sinh', gender='$Giới_tính', hometown='$Quê_quán', level='$Trình_độ_học_vấn', `group`='$Nhóm' WHERE id=$this_id";

        mysqli_query($conn, $sql);
        
        header('location: index.php');
    }
?>

<h1> Thành viên: <?php echo $row['fullname']; ?></h1>

<form method="post" enctype="multipart/form-data">
    <p> Họ và tên </p>
    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>">

    <p>Ngày sinh</p>
    <input type="date" name="dob" value="<?php echo $row['dob']; ?>">

    <p>Giới tính</p>
    <input type="radio" id="male" name="gender" value="male" <?php echo ($row['gender'] == 'male') ? 'checked' : ''; ?>>
    <label for="male">Nam</label>
    <input type="radio" id="female" name="gender" value="female" <?php echo ($row['gender'] == 'female') ? 'checked' : ''; ?>>
    <label for="female">Nữ</label><br>

    <p>Quê quán</p>
    <input type="text" name="hometown" value="<?php echo $row['hometown']; ?>">

    <p>Trình độ học vấn</p>
    <select id="level" name="level" required>
        <option value="0" <?php if($row['level'] == 'TS') echo 'selected'; ?>>Tiến sĩ</option>
        <option value="1" <?php if($row['level'] == 'ThS') echo 'selected'; ?>>Thạc sĩ</option>
        <option value="2" <?php if($row['level'] == 'KS') echo 'selected'; ?>>Kỹ sư</option>
        <option value="3" <?php if($row['level'] == 'Khác') echo 'selected'; ?>>Khác</option>
    </select><br>

    <p>Nhóm</p>
    <input type="text" name="group" value="<?php echo $row['group']; ?>">

    <br><br>
    <button id="submit" name="edit">Lưu</button>
</form>