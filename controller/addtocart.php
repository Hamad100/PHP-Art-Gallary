<?php include('connection.php'); ?>
<?php
include('item.php');

if(isset($_GET['art_id']) && isset($_GET['action']) && !isset($_POST['update']))  {//start
    $idddd = $_GET['art_id'];
    $sqll = "SELECT * FROM artrepo WHERE art_id= $idddd";
    $res = mysqli_query($connect, $sqll);
    $product = mysqli_fetch_object($res);
    $item = new Item();
    $item->art_id = $product->art_id;
    $item->artist = $product->artist;
    $item->price = $product->price;
    $item->image_name = $product->image_name;
    $item->quantity = 1;
    

    // Check product is existing in cart
    $index = -1;
    
    if($index == -1){
            $_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
        }   
        else {
            $_SESSION['cart'] = $cart;
        }
    
        $cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
        for($i=0; $i<count($cart);$i++)
            if ($cart[$i]->art_id == $_GET['art_id']){
                $index = $i;
                break;
            }
        
}//end

     // Delete product in cart
    if(isset($_GET['index']) && !isset($_POST['update'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }
    // Update quantity in cart
    if(isset($_POST['update'])) {
        $arrQuantity = $_POST['quantity'];
        $cart = unserialize(serialize($_SESSION['cart']));
        for($i=0; $i<count($cart);$i++) {
            $cart[$i]->quantity = $arrQuantity[$i];
        }
        $_SESSION['cart'] = $cart;
    }

    if(isset($_SESSION['cart'])){
        $cartTable = "<form method='POST'>
        <table class=\"table table-bordered table-striped\">
            <thead class=\"thead-inverse\">
                <th>Id</th>
                <th>Image</th>
                <th>Artist</th>" .
                "<th>Price</th>
                <th>Delete</th>
            </thead>";
    $cart = unserialize(serialize($_SESSION['cart']));
    $s = 0;
    $index = 0;
        for($i=0; $i<count($cart); $i++){
            $s += $cart[$i]->price * $cart[$i]->quantity;
            //$p = $cart[$i]->price * $cart[$i]->quantity;

            $cartTable .= "<tr>";
            $cartTable .= "<td>" . $cart[$i]->art_id . "</td>";
            $cartTable .="<td><img height=\"50\" width=\"50\" src='upload/" . $cart[$i]->image_name . "'></td>";
            $cartTable .="<td>" . $cart[$i]->artist . "</td>";
            $cartTable .="<td>" . $cart[$i]->price . "</td>";
            $cartTable .= "<td><a href=\"cart.php?index=$index\" onclick=\"return confirm('Are you sure?')\" >Delete</a> </td></tr>";
            $index++;
        }
    $cartTable .= "<tr>
        <td colspan=\"3\" style=\"text-align:right; font-weight:bold\">Total Cost:

            <input type=\"hidden\" name=\"update\">
        </td>
        <td colspan=\"2\"> $s</td>
    </tr>
    </table>
    </form>";

    }


?>




