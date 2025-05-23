<!-- <h1>Home For manage user (not home for landing)</h1> -->
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>User List</h3>
        <div>
            <a href="./?page=user/create" class="btn btn-success">Add User</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>User_label</th>
                    <th>LEVEL</th>
                    <th>Action</th>
                </tr>

                <?php
                // first  method 
                // $manage_users = getUsers();
                // if($manage_users != null){
                //     while($row = $manage_users->fetch_object()){
                //       echo '<tr>
                //                 <td>'.$row->id_user.'</td>
                //                 <td>'.$row->user_label.'</td>
                //             </tr>';
                //     }
                // }
                ?>


                <?php
                // second  method 
                $manage_users = getUsers();
                if ($manage_users != null) {
                    while ($row = $manage_users->fetch_object()) {
                ?>
                        <tr>
                            <td><?php echo $row->id_user; ?></td>
                            <td><?php echo $row->user_label; ?></td>
                            <td><?php echo $row->level; ?></td>
                            <td>
                                <a class="btn btn-primary" href="./?page=user/update&id=<?php echo $row->id_user ?>">Update</a>
                                <a class="btn btn-danger" href="./?page=user/delete&id=<?php echo $row->id_user ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>