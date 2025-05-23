<?php

function getStocks()
{
    // admin // user
    global $db;
    $query = $db->query("SELECT * FROM tbl_stock");
    // $db->close();
    if ($query->num_rows) {
        return $query;
    }
    return null;
}

function createStock($id_product, $qty, $date)
{
    global $db;
    $query = $db->prepare("INSERT INTO tbl_stock (id_product,qty,date) VALUES (?,?,?)");
    $query->bind_param('iis', $id_product, $qty, $date);
    $query->execute();
    if ($db->affected_rows) {
        return true;
    }
    return false;
}

function getStockByID($id)
{
    // admin // user
    global $db;
    $query = $db->prepare("SELECT * FROM tbl_Stock WHERE id_Stock = ?");
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    }
    return null;
}

// function updateStock($id, $id_product, $qty, $date)
// {
//     global $db;
//     $db->query("UPDATE tbl_Stock SET id_product='$id_product', qty='$qty', date='$date'  WHERE id_Stock='$id'");
//     if ($db->affected_rows) {
//         return getStockByID($id);
//     }
//     return false;
// }
function deleteStock($id)
{
    global $db;
    $query = $db->prepare("DELETE FROM tbl_stock WHERE id_stock =?");
    $query->bind_param('i', $id);
    $query->execute();
    if ($db->affected_rows) {
        return true;
    }
    return false;
}
