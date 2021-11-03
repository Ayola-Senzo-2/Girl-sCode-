<?php 
session_start();
include 'header.php';
include 'config.php';?>

<div class="container">
<div class="row">

<div class="col-9">
<div class="container " style="width:800px">  

 <?php
      
     $food_sql = "SELECT food_id, f.canteen_id, c.canteen_id, food_name,food_image, food_status, food_price, canteen_name 
     FROM food f, canteen c
     WHERE f.canteen_id = c.canteen_id";

      $stmt = $con->prepare($food_sql);
      //$stmt->bind_param("i",$id);
       $stmt->execute();
       $result = $stmt->get_result();

  while ($row = $result->fetch_assoc()):?>
   <?php if ($row['food_status']==1): ?>

<div class="col-md-4 menu-canteen">
	<form method="post" action="index.php?action=add&<?php echo $row['food_id']; ?>">
      <div style="border:1px solid #FBA444; background-color:#E1E5F0; border-radius:8px; padding:16px;" align="center">  
			  <img src="<?php echo BASE_URL; ?>/images/<?=$row['food_image']?>" width="80" hieght="80" class="img-responsive food-img" /><br />  
                <h4 class="food-text"><?php echo $row["food_name"]; ?></h4>  
                  <h4 class="food-text"><?php echo $row["canteen_name"]; ?></h4>  
                   <h4 class="food-text">R<?php echo $row["food_price"]; ?></h4>  
                    <input type="text" name="quantity" class="form-control" value="1" />  
                  <input type="hidden" name="hidden_name" value="<?php echo $row["food_name"]; ?>" />  
                <input type="hidden" name="hidden_price" value="<?php echo $row["food_price"]; ?>" />  
              <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                  
		</div>
	</form>
	
</div>

<?php endif;?>

<?php endwhile;?>

</div>

</div>

<div class="col-3">
	<div class="container">
                <br />  
                <h3>Cart: 4</h3>  
               
                </div>  
           </div>  
           <br />  
		
	</div>       
	</div>






	</div>
	</div>



<?php include 'footer.php'?>;