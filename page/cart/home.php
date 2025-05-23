<!-- <h1>Home For manage user (not home for landing)</h1> -->
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>Cart List</h3>
        <div>
            <a href="./?page=cart/placing" class="btn btn-success">Add Category</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Action</th>
                </tr>
                <?php 
                $manage_cart_details = getPendingCartProductDetails();
                if ($manage_cart_details != null) {
                    while ($row = $manage_cart_details->fetch_object()) {
                        $product = getProductByID($row->id_product);
                ?>
                        <tr>
                            <td><?php echo $product->name ?></td>
                            <td><?php echo $product->price ?>$</td>
                            <td>
                                <input class="w-50 form-control" type="number" value="1">
                            </td>
                            <td>
                                <a class="btn btn-danger" href="./?page=cart/delete&id=<?php echo $row->id_cart_detail ?>">Delete</a>
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