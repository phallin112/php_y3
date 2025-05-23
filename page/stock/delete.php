<?php
    if (!isset($_GET['id']) || getStockByID($_GET['id']) === null) {
        header('Location: ./?page=stock/home');
    }
    if(deleteStock($_GET['id'])) {
        echo '<div class="alert alert-success" role="alert">
                    Stock deleted Successfully. <a href = "./?page=stock/home">Stock page</a>
                </div>';
    }else {
        echo '<div class="alert alert-danger" role="alert">
                    can not delete Stock! <a href = "./?page=stock/home">Stock page</a>
                </div>';
    }
?>