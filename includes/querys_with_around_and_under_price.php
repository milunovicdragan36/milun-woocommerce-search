<?php
$sale_price_total =array_merge($sale_price,$variation_price_sale);   

$regular_price_total = array_merge($regular_price,$variation_price_regular);
  
$price = array_merge($sale_price_total,$regular_price_total);   
/*
if (!empty($sale_price_total)) {


$result_2 = array_map(function($x){
    return $x;
}, $price);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 




}else{
 return $regular_price_total;
}
*/


if (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray) == 0 && count($sku) == 0 && count($type)==0) {
$result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 




}else



 


if (!empty($sale_price_total)&&!empty($totalArray_users) && count($first_meta_data)==0 && count($totalArray) == 0 && count($sku) == 0 && count($type)==0) {
$result_5 = array_values(array_udiff($price,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 




}
elseif(!empty($sale_price_total)&&count($totalArray_users) == 0 && count($first_meta_data)==0 && !empty($totalArray) && count($sku) == 0 && count($type)==0){
  $result_5 = array_values(array_udiff($price,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 
}
elseif(!empty($totalArray_users) && count($first_meta_data)==0 && !empty($totalArray)  && count($sku) == 0&& count($type) == 0){



  $result_5 = array_values(array_udiff($sale_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 


}


elseif(!empty($sale_price_total)&&count($totalArray_users) == 0 && count($first_meta_data)==0 && count($totalArray) == 0 && !empty($sku)&& count($type)==0){
 


 $result_5 = array_values(array_udiff($price,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}


return array_values($files_record); 

}elseif(!empty($sale_price_total)&&count($totalArray_users) == 0&& count($first_meta_data)==0 && count($totalArray) == 0 && count($sku)==0 && !empty($type)){

 $result_5 = array_values(array_udiff($sale_price_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}




return array_values($files_record); 

}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) &&!empty($totalArray_users) && count($totalArray) == 0 && count($sku)==0 && count($type)==0) {
 $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && count($sku)==0 && count($type)==0) {
 $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && !empty($sku) && count($type)==0) {
 $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}
elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && count($sku)==0 && !empty($type)) {
 $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (!empty($sale_price_total)&&!empty($totalArray_users) &&count($first_meta_data) == 0 && count($totalArray) == 0 && !empty($sku)&& count($type)==0) {
 $result_5 = array_values(array_udiff($price,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}
elseif(!empty($sale_price_total)&&count($totalArray_users) == 0 && count($first_meta_data)==0 && !empty($totalArray) && !empty($sku)&& count($type)==0){



  $result_5 = array_values(array_udiff($price,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(!empty($sale_price_total)&&!empty($totalArray_users) && count($first_meta_data)==0 && count($totalArray)==0 && count($sku)==0 && !empty($type)){



  $result_5 = array_values(array_udiff($price,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(!empty($sale_price_total)&&count($totalArray_users) == 0&& count($first_meta_data)==0 && !empty($totalArray) && count($sku)==0 && !empty($type)){



  $result_5 = array_values(array_udiff($price,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(!empty($sale_price_total)&&count($totalArray_users) == 0 && count($first_meta_data)==0 && count($totalArray)==0 && !empty($sku) && !empty($type)){



  $result_5 = array_values(array_udiff($price,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && count($sku)==0 && count($type)==0) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && !empty($sku) && count($type)==0) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && count($sku)==0 && !empty($type)) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}
elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && !empty($sku)==0 && count($type)==0) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && count($sku)==0 && !empty($type)) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}

elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && !empty($sku) && !empty($type)) {
 
  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}





elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && !empty($sku) && count($type)==0) {
 
 

  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}


elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && count($sku)==0 && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}


elseif (!empty($sale_price_total)&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && !empty($sku) && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}



elseif (!empty($sale_price_total)&&!empty($first_meta_data) && count($totalArray_users) && !empty($totalArray) && !empty($sku) && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}




elseif(!empty($sale_price_total)&&count($first_meta_data)==0 &&!empty($totalArray_users) && !empty($totalArray)  && !empty($sku) &&count($type)==0){



  $result_5 = array_values(array_udiff($price,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(!empty($sale_price_total)&&count($first_meta_data)==0 &&count($totalArray_users)==0 && !empty($totalArray)  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($price,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(!empty($sale_price_total)&&count($first_meta_data)==0 && !empty($totalArray_users) && count($totalArray)==0  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($price,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(!empty($sale_price_total)&&count($first_meta_data)==0 && !empty($totalArray_users) && !empty($totalArray)  && count($sku)==0 &&!empty($type)){



  $result_5 = array_values(array_udiff($price,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}


elseif(!empty($sale_price_total)&&!empty($first_meta_data) &&!empty($totalArray_users) && !empty($totalArray)  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($price,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}
  $result_29 = array_values(array_udiff($files_record_20,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_29);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}
return array_values($files_record_20); 

}

elseif(!empty($sale_price_total)&&count($first_meta_data) == 0 &&count($totalArray_users) == 0 && count($totalArray) == 0 && count($sku)==0 && count($type)==0){
 


$files_record = array();
$post_title = array();
foreach($price as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}

return array_values($files_record); 

}



////////////////****   empty sale price *******///////////


if (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray) == 0 && count($sku) == 0 && count($type)==0) {
$result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 




}



 


if (count($sale_price_total)==0&&!empty($totalArray_users) && count($first_meta_data)==0 && count($totalArray) == 0 && count($sku) == 0 && count($type)==0) {
$result_5 = array_values(array_udiff($regular_price_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 




}
elseif(count($sale_price_total)==0&&count($totalArray_users) == 0 && count($first_meta_data)==0 && !empty($totalArray) && count($sku) == 0 && count($type)==0){
  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}
return array_values($files_record); 
}
elseif(!empty($totalArray_users) && count($first_meta_data)==0 && !empty($totalArray)  && count($sku) == 0&& count($type) == 0){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 


}


elseif(count($sale_price_total)==0&&count($totalArray_users) == 0 && count($first_meta_data)==0 && count($totalArray) == 0 && !empty($sku)&& count($type)==0){
 


 $result_5 = array_values(array_udiff($regular_price_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}


return array_values($files_record); 

}elseif(count($sale_price_total)==0&&count($totalArray_users) == 0&& count($first_meta_data)==0 && count($totalArray) == 0 && count($sku)==0 && !empty($type)){

 $result_5 = array_values(array_udiff($regular_price_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}




return array_values($files_record); 

}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) &&!empty($totalArray_users) && count($totalArray) == 0 && count($sku)==0 && count($type)==0) {
 $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && count($sku)==0 && count($type)==0) {
 $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && !empty($sku) && count($type)==0) {
 $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}
elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && count($sku)==0 && !empty($type)) {
 $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}

elseif (count($sale_price_total)==0&&!empty($totalArray_users) &&count($first_meta_data) == 0 && count($totalArray) == 0 && !empty($sku)&& count($type)==0) {
 $result_5 = array_values(array_udiff($regular_price_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
return array_values($files_record_total); 





}
elseif(count($sale_price_total)==0&&count($totalArray_users) == 0 && count($first_meta_data)==0 && !empty($totalArray) && !empty($sku)&& count($type)==0){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(count($sale_price_total)==0&&!empty($totalArray_users) && count($first_meta_data)==0 && count($totalArray)==0 && count($sku)==0 && !empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(count($sale_price_total)==0&&count($totalArray_users) == 0&& count($first_meta_data)==0 && !empty($totalArray) && count($sku)==0 && !empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif(count($sale_price_total)==0&&count($totalArray_users) == 0 && count($first_meta_data)==0 && count($totalArray)==0 && !empty($sku) && !empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}




return array_values($files_record_total); 
}
elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && count($sku)==0 && count($type)==0) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && !empty($sku) && count($type)==0) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && count($sku)==0 && !empty($type)) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 







}
elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && !empty($sku)==0 && count($type)==0) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && !empty($totalArray) && count($sku)==0 && !empty($type)) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}

elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users)==0 && count($totalArray)==0 && !empty($sku) && !empty($type)) {
 
  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}





elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && !empty($sku) && count($type)==0) {
 
 

  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}


elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && !empty($totalArray) && count($sku)==0 && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}


elseif (count($sale_price_total)==0&&!empty($first_meta_data) && !empty($totalArray_users) && count($totalArray)==0 && !empty($sku) && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}



elseif (count($sale_price_total)==0&&!empty($first_meta_data) && count($totalArray_users) && !empty($totalArray) && !empty($sku) && !empty($type)) {
 
 

  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}

return array_values($files_record_20); 







}




elseif(count($sale_price_total)==0&&count($first_meta_data)==0 &&!empty($totalArray_users) && !empty($totalArray)  && !empty($sku) &&count($type)==0){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(count($sale_price_total)==0&&count($first_meta_data)==0 &&count($totalArray_users)==0 && !empty($totalArray)  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(count($sale_price_total)==0&&count($first_meta_data)==0 && !empty($totalArray_users) && count($totalArray)==0  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}
elseif(count($sale_price_total)==0&&count($first_meta_data)==0 && !empty($totalArray_users) && !empty($totalArray)  && count($sku)==0 &&!empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}


  $result_9 = array_values(array_udiff($files_record_total,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

return array_values($files_record_10); 

}


elseif(count($sale_price_total)==0&&!empty($first_meta_data) &&!empty($totalArray_users) && !empty($totalArray)  && !empty($sku) &&!empty($type)){



  $result_5 = array_values(array_udiff($regular_price_total,$first_meta_data, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}



  $result_5 = array_values(array_udiff($files_record,$totalArray_users, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_2 = array_map(function($x){
    return $x;
}, $result_5);

$files_record_total = array();
$post_title = array();
foreach($result_2 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_total[$key] = $value;
   }

}
  $result_9 = array_values(array_udiff($files_record_total,$totalArray, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_10 = array_map(function($x){
    return $x;
}, $result_9);

$files_record_10 = array();
$post_title = array();
foreach($result_10 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_10[$key] = $value;
   }

}

  $result_19 = array_values(array_udiff($files_record_10,$sku, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_19);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}
  $result_29 = array_values(array_udiff($files_record_20,$type, function ($a, $b) {
    return strcmp($a->post_title,$b->post_title);
}));

$result_20 = array_map(function($x){
    return $x;
}, $result_29);

$files_record_20 = array();
$post_title = array();
foreach($result_20 as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record_20[$key] = $value;
   }

}
return array_values($files_record_20); 

}

elseif(count($sale_price_total)==0&&count($first_meta_data) == 0 &&count($totalArray_users) == 0 && count($totalArray) == 0 && count($sku)==0 && count($type)==0){
 


$files_record = array();
$post_title = array();
foreach($regular_price_total as $key=>$value){
   if(!in_array($value->post_title, $post_title)){
      $post_title[] = $value->post_title;
      $files_record[$key] = $value;
   }

}

return array_values($files_record); 

}
?>

?>
