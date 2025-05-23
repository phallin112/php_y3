<?php
    if (!isset($_GET['id']) || getUsersByID($_GET['id']) === null) {
        header('Location: ./?page=user/home');
    }
    if(deleteUser($_GET['id'])) {
        echo '<div class="alert alert-success" role="alert">
                    User deleted Successfully. <a href = "./?page=user/home">User page</a>
                 </div>';
    }else {
        echo '<div class="alert alert-danger" role="alert">
                    can not delete User! <a href = "./?page=user/home">User page</a>
                 </div>';
    }
?>