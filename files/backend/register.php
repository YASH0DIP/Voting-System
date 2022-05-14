<?php
    include("connect.php");
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $std = $_POST['std'];


    if($password!=$cpassword){
        echo "<script>
            alert('Passwords Did Not Match');
            window.location = '../sign_up.php';
        </script>";
    }
    else{
        move_uploaded_file($tmp_name,"./files/images/$image");
        $sql_query = "insert into `userdata` (username,mobile,password,image,standard,status,votes)
        values ('$username','$mobile','$password','$image','$std',0,0)";

        $result = mysqli_query($con,$sql_query);

        if($result){
        echo "<script>
            alert('Registration Successfull');
            window.location = '../../';
        </script>";
        }

    }

    
?>