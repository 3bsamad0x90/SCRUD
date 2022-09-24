<?php
    $error_fields = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //validation
        if(! (isset($_POST['name']) && !empty($_POST['name'])) ){
            $error_fields[] = 'name';
        }
        if(! (isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) )){
            $error_fields[] = 'email';
        }

        //connection 
        if(!$error_fields){
            require_once("connect.php");
            $id = $_POST['id'];
            $name = $_POST['name'];
            //select password from dB

            $passSelect = "SELECT password FROM users WHERE id = $id";
            $passSelect = $conn -> query($passSelect);
            $pass = $passSelect -> fetch_assoc();
            if(isset($_POST['password'])){
                $password = MD5($_POST['password']);
            }else{
                $password = $pass['password'] ;
            }
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $priv = $_POST['priv'];
            $image = $_FILES['image'];
            $imgName = uniqid() . $image['name'];
            $imgTmp = $image['tmp_name'];
            move_uploaded_file($imgTmp, "../uploads/$imgName");

            //update query
            $query = "UPDATE users SET 
                        name        =   '$name',
                        password    =   '$password',
                        email       =   '$email',
                        gender      =   '$gender',
                        admin       =   '$priv',
                        image       =   '$imgName' 
                        WHERE id= $id";
            $updateQuery = $conn -> query($query);
            if($updateQuery){
                header("Location: ../index.php");
                exit();
            }
        }else{
            header("Location: ../index.php?action=edit");
            exit();
        }

    }


?>