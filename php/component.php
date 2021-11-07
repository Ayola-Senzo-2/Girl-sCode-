<?php

function component($food_name,$canteen_name,$food_desc, $food_price, $food_image, $food_id){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"item-card card shadow\">
                        <div>
                            <img src=\"upload/$food_image\" alt=\"Image1\" class=\"img img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$food_name</h5>
                            <h6><i class=\"fas fa-store\"></i>  $canteen_name</h6>
                            <p class=\"card-text\">$food_desc</p>
                            <h5>
                                <span class=\"price\">R$food_price</span>
                            </h5>

                            <button type=\"submit\" class=\"btn add-cart-btn\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='food_id' value='$food_id'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($food_image, $food_name,$canteen_name, $food_price, $food_id){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$food_id\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\" cart-card row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=upload/$food_image alt=\"Image1\" class=\"cart-img img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$food_name</h5>
                                <small class=\"text-secondary\"> <i class=\"fas fa-store\"></i> $canteen_name</small>
                                <h5 class=\"pt-2\">R$food_price</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;



}



function addressDropDown($address){


        $element = "

        <select name=\"\">
            <option value=\"volvo\">$address</option>
         </select>
        ";
        

   
    echo $element;
}

















