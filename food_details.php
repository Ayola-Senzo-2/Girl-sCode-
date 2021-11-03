<?php 
include 'header.php';?> 



	<div class="container">
		<div class="row">

			<?php  if (isset($_GET['fid']))
				  $fid = $_GET['fid'];
				$sql = "SELECT f.canteen_id,c.canteen_id, food_id, food_name, food_price, canteen_name, food_image
			        FROM food f, canteen c
					WHERE f.canteen_id = c.canteen_id
			        AND food_id=".$fid;

			       $stmt = $con->prepare($sql);
			       $stmt->execute();
			       $result = $stmt->get_result();

			       while ($row = $result->fetch_assoc()):?>

			      <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="cs-card mb-3 cs-product-card">
					
                       <img src="https://restaurantfoodorderingscript.digisamaritan.com/uploads/item_images/item_128.jpg" alt="Butterscotch" class="img-responsive" title="Butterscotch">
					   
                        <div class="cs-card-content clearfix">
                            
                                <div class="pull-left">
                                    <h4 title="Butterscotch">Butterscotch</h4>
									
								<!--
								1.only options
								2.options and addons
								3.only addons
								-->
								
								
                                 								
								<p>$125.00</p>
								
																
								
                                </div>
                           
                            <div class="pull-right">
							<!---add to cart/choose addons,items-->
							
                           						   
						   <!---->
							<form id="item_form_128">

							<input type="hidden" id="itemFrom128" value="items">
							<input type="hidden" id="selected_item_id128" value="128">
							<input type="hidden" id="selected_menu_id128" value="14">
							<input type="hidden" id="selected_item_cost128" value="125.00">

							</form>
							<!---->
							
                                <a href="javascript:void(0);" onclick="addToCart('128')" class="btn btn-sm btn-round btn-primary card-btn">Add to cart</a>
								
								
								
                            </div>
                        </div>
                    </div>
                    </div>
			    
			    <?php  endwhile; ?>
			   
			
			
		</div>
	</div>


<?php include 'footer.php';?>
