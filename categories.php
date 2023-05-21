<?php 
ob_start();
session_start();
include "init.php";?>
<div class="container categories">
    <h1 class="text-center"> Show Category </h1>
        
    <div class="row row-cols-md-4 row-cols-sm-2 row-cols-xs-1">
    
    <?php 
       if(isset($_GET['pageid']) && is_numeric($_GET['pageid'])){
        $category = intval($_GET['pageid']);
        $getAllItems = getAll('*' ,'items','WHERE cat_id = ' .$category , 'AND approve = 1' ,'id' );
        foreach($getAllItems as $item){
         echo'<div class="col  ">';
         echo' <div class="card item-box ">' ;
         echo '<span class="price-tag text-center">$'.$item['price'] .'</span>';
         echo '<span class="favorit "><i class="fa-regular fa-heart"></i> </span>';
         echo "<img  src='admin/images/items/ " . $item['image'] . "' class='card-img-top' style='height:350px;'> ";
         echo '<div class="card-body">';
         echo '<h5 class="card-title"><a href="items.php?item_id=' . $item['id'].'">'.$item['name'] .'</a></h5>';
        //  echo '<p class="card-text p-0 m-0">'. $item['description'] .  '<span class="".</p>';
         echo '<a href="val.php?id='.$item['id'] .'" class="btn btn-cart m-0"><i class="fa-solid fa-cart-shopping"></i> Add to cart <span class="">.</a>';

         echo '<p class="date  card-text p-0 m-0"> '. $item['add_date'] .  '<span class="".</p>';

         echo '</div>';
         echo '</div>';
         echo ' </div>';
    } 
  }else{
    echo "you must add page id";

  }
    ?> 
 
</div>
</div>

<?php include $tpl.'footer.php';
ob_end_flush();
?>