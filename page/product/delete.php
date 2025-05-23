<?php
    if (!isset($_GET['id']) || getProductByID($_GET['id']) === null) {
        header('Location: ./?page=product/home');
    }
    if(deleteProducts($_GET['id'])) {
        echo '<div class="alert alert-success" role="alert">
                    product deleted Successfully. <a href = "./?page=product/home">product page</a>
                 </div>';
    }else {
        echo '<div class="alert alert-danger" role="alert">
                    can not delete product! <a href = "./?page=producty/home">product page</a>
                 </div>';
    }
?>