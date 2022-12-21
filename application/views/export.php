<?php 

header('Content-type: text/csv; charset=utf-8');
header("Content-Disposition: attachment;filename=Products.csv");
$query = array();
$output= fopen("php://output","w");
fputcsv($output,array('title','description','category','vendor','tag','price','compare_price','cost','sku','barcode','weight','weight_unit','quantity','country'));
fputcsv($output,$query);
fclose($output);

?>