<h1>Kết quả tìm kiếm:</h1>
    <?php 
        include "connect.php";

        if(isset($_POST['timkiem'])){
            $search=$_POST['search'];
        
        $sql = "SELECT * FROM `table_students` WHERE CONCAT(fullname, '', hometown) LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0 ){
        while( $row = mysqli_fetch_array($result))
        {
            echo "Họ và tên: " . $row['fullname'] . "<br>";
                        echo "Ngày sinh: " . $row['dob'] . "<br>";
                        echo "Giới tính: " ;
                        if ($row['gender'] == 0){
                            echo "Nữ";
                        } else if ($row['gender'] == 1){
                            echo"Nam";
                        }
                        echo "<br>";
                        echo "Quê quán: " . $row['hometown'] . "<br>";
                        echo "Trình độ học vấn: ";
                        if ($row['level'] == 0) {
                            echo "Tiến sĩ";
                        } else if ($row['level'] == 1) {
                            echo "Thạc sĩ";
                        } else if ($row['level'] == 2) {
                            echo "Kỹ sư";
                        } else if ($row['level'] == 3) {
                            echo "Khác";
                        }
                        echo "<br>";
                        
                        echo "Nhóm: " . $row['group'] . "<br><br>";
                    }
    } else {
        echo "Không tìm thấy sinh viên hợp lệ.";
    }
}

?>

<a href="index.php">
    <button type="button" class="exit">Trở lại</button>
</a>