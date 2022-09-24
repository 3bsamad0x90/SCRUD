<?php
    require_once("connect.php");
    // sql select query
    $query = "SELECT * FROM users" ;
    $result = $conn -> query($query);
?>
<div class="container mt-2 p-2">
<form method="post" action="functions/addHandle.php" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name = "name" placeholder="Enter your Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="Password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name = "password" class="form-control" id="Password" placeholder="Enter your password">
        </div>
    </div>
    <div class="form-group row">
        <label for="Email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name = "email" class="form-control" id="Email" placeholder="email@example.com">
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                <label class="form-check-label" for="female">Female</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Privilege</label>
        <div class="col-sm-10">
            <select class="custom-select my-1 mr-sm-2" id="priv" name= "priv">
                <option selected>Choose...</option>
                <option value="1">Admin</option>
                <option value="0">User</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="file" name="image" id="image">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"> </label>
        <div class="col-sm-10">
                <input class="btn btn-primary btn-block" type="submit" name="submit" Value="Add">
        </div>
    </div>
    
</form>
</div>