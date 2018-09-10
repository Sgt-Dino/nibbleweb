<?php

// function get_category_name($catID) {
// 	$query = 'CALL uspCategoryName(:catID)';
// 	$params = array(':catID' => $catID);
// 	$result = DatabaseHandler::GetRow($query, $params);
// 	return $result['categoryName'];
// }

function get_profile($restaurantadminid) {
	$query = 'CALL uspGetProfile(:AdminID)';
	$params = array(':AdminID' => $restaurantadminid);
	return DatabaseHandler::GetRow($query, $params);
}

// function get_product_details($productID) {
// 	$query = 'CALL uspGetProductDetails(:productID)';
// 	$params = array(':productID' => $productID);
// 	return DatabaseHandler::GetRow($query, $params);
// }

// function delete_product($productID) {
// 	$query = 'CALL uspDeleteProduct(:productID)';
// 	$params = array(':productID' => $productID);
// 	DatabaseHandler::Execute($query, $params);
// }

// function add_product($cat_id, $code, $name, $price) {
// 	$query = 'CALL uspInsertProduct(:catID, :prodCode, :prodName, :price)';
// 	$params = array(':catID' => $cat_id, ':prodCode' => $code,
// 		':prodName' => $name, ':price' => $price);
// 	DatabaseHandler::Execute($query, $params);
// }
// function update_product($prod_id, $prod_code, $price) {
// 	$query = 'CALL uspUpdateProduct(:prodID, :prodCode, :price)';
// 	$params = array(':prodID' => $prod_id, ':prodCode' => $prod_code,
// 		':price' => $price);
// 	DatabaseHandler::Execute($query, $params);
// }
?>