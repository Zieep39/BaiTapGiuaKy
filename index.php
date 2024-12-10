<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên Của Tổ</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Danh Sách Sinh Viên</h1>

    <form method="POST" action="search.php">
        <input type="text" name="search" placeholder="Nhập họ tên hoặc quê quán sinh viên...">
        <button type="submit" name="timkiem">Tìm kiếm</button>
    </form>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th colspan="2"></th>
            
        </tr>
    </thead>

    <tbody>
        <?php 
            include "connect.php";
            $sql = "SELECT * FROM `table_students`";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)){

        ?>
        
            <tr>
                <td><?php echo $row['id'] ?> </td>
                <td><?php echo $row['fullname'] ?> </td>
                <td><?php echo $row['dob'] ?> </td>
                <td><?php echo $row['gender'] == 0 ? "Nữ" : "Nam"; ?> </td>
                <td><?php echo $row['hometown'] ?> </td>
                <td><?php  if ($row['level'] == 0) {
                            echo "Tiến sĩ";
                        } else if ($row['level'] == 1) {
                            echo "Thạc sĩ";
                        } else if ($row['level'] == 2) {
                            echo "Kỹ sư";
                        } else if ($row['level'] == 3) {
                            echo "Khác";
                        }       
                        ?> </td>
                <td><?php echo $row['group'] ?> </td>
          

                <td>
                <span> <a href="delete.php?this_id=<?php echo $row['id'] ?>"> Xóa </a> </span>
                </td>
                <td>
                <span> <a href="edit.php?this_id=<?php echo $row['id'] ?>"> Sửa </a> </span>
                </td>
            </tr>
        <?php } ?>
    </tbody>

    </table>
    <a href="add.php">
        <br><button>Thêm Sinh viên</button>
    </a>

</body>
</html>
