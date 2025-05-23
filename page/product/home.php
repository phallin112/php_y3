<!-- <h1>Home For manage user (not home for landing)</h1> -->
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>Product List</h3>
        <div>
            <a href="./?page=product/create" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Short Des</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                <?php
                $manage_products = getProducts();
                if ($manage_products != null) {
                    while ($row = $manage_products->fetch_object()) {
                ?>
                        <tr>
                            <td><?php echo $row->id_product ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->slug ?></td>
                            <td><?php echo $row->price; ?></td>
                            <td><?php echo $row->qty; ?></td>
                            <td><?php echo $row->short_des; ?></td>
                            <td><img style="width: 100px;" src="<?php echo $row->image ?>" alt=""></td>
                            <td>
                                <?php
                                $categories = getProductCategoies($row->id_product);
                                if ($categories !== null) {
                                    while ($category = $categories->fetch_object()) {
                                        echo  $category->name . '<br>';
                                    }
                                } else {
                                    echo 'No categories';
                                }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-primary my-3" href="./?page=product/update&id=<?php echo $row->id_product ?>">Update</a>
                                <a class="btn btn-danger" href="./?page=product/delete&id=<?php echo $row->id_product ?>">Delete</a>
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