<?php
    require_once("connect.php");
    // sql select query
    $query = "SELECT * FROM users" ;
    
    //search 
    if(isset($_GET['search'])){
        $search = trim($_GET['search']);
        $query .= " WHERE name LIKE '%$search%' ";
    }
    $result = $conn -> query($query);
?>
    <table class="table container">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Image</th>
                <th scope="col">Gender</th>
                <th scope="col">Privilege</th>
                <th scope="col">Controls</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
                // $row = $result -> fetch_assoc();
                $id = 0 ;
                while($row = $result -> fetch_assoc()):
            ?>
            <tr>
                <th><?= ++$id ?></th>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <img src="uploads/<?= $row['image']; ?>" alt="image" style="width:70px; height: 70px;">
                </td>
                <td><?= $row['gender'] ?></td>
                <td><?=
                    ($row['admin'] == 1 ) ? "Admin" : "User" 
                    ?>
                </td>
                <td>
                    <a href="?action=edit&id=<?= $row['id']?>" class = "btn btn-info">Edit</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ID<?= $row['id'];?>">
                    Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="ID<?= $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are You Sure To Delete <?= $row['name'] ?> ? 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="functions/delete.php?id=<?= $row['id']?>" class = "btn btn-danger">Confirm</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            endwhile ;
            ?>
        </tbody>
        <tfoot class="text-left">
            <tr>
                <th colspan ="2">
                    Number of users :
                </th>
                <td  class="text-center">
                    <?= $result -> num_rows ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="?action=add" class = "btn btn-primary btn-block">Add User</a>
                </td>

            </tr>
        </tfoot>
    </table>