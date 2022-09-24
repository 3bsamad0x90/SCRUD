<?php
    $error_fields = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //validation
        if(! (isset($_POST['name']) && !empty($_POST['name'])) ){
            $error_fields[] = 'name';
        }
        if(! (isset($_POST['password']) && strlen($_POST['password']) > 5 )){
            $error_fields[] = 'password';
        }
        if(! (isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) )){
            $error_fields[] = 'email';
        }

        //connection 
        if(!$error_fields){
            require_once("connect.php");
            $name = $_POST['name'];
            $password = MD5($_POST['password']);
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $priv = $_POST['priv'];
            $image = $_FILES['image'];
            $imgName = uniqid() . $image['name'];
            $imgTmp = $image['tmp_name'];
            move_uploaded_file($imgTmp, "../uploads/$imgName");

            //insert query
            require_once("connect.php");
            $query = "INSERT INTO users(name, password, email, gender, admin, image) 
                VALUES ('$name','$password','$email','$gender','$priv','$imgName')";
            $insertQuery = $conn -> query($query);
            if($insertQuery){
                header("Location: ../index.php");
                exit();
            }
        }else{
            header("Location: ../index.php?action=add");
            exit();
        }

    }


?>