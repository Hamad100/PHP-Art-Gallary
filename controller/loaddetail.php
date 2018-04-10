<?php include('connection.php'); ?>
<?php

//loads content
$loadDetail = null;
$artid = null;

if(isset($_GET['art_id'])){
    $artid = $_GET['art_id'];
}

$selectCat = "SELECT category FROM artrepo where art_id='$artid'";
$result = mysqli_query($connect, $selectCat);
while($r = mysqli_fetch_assoc($result)){
    $cateName = $r['category'];
}


function loadDetail($artid){
    global $connect;
    $loadContent = "SELECT * FROM artrepo where art_id='$artid'";
    $result = mysqli_query($connect, $loadContent);
    $detail = "<div class=\"row\">";
    while($row = mysqli_fetch_assoc($result)) {
        //include("partial/zoom.php");
        $detail .= "<div class=\"col-sm-6\">";
//        artwork image
        $detail .= "<a href=\"#\" data-target=\"#myModal\" data-toggle=\"modal\"><img src='upload/" . $row['image_name'] . "' class=\"img-responsive\"></a></div>";
        $detail .= "<div class=\"col-sm-6 artdesc\">";
        $detail .= "<h2>Description</h2>";
        $detail .= "<p>{$row['description']}</p>";
        $detail .= "<a href=\"#\"><h4>{$row['artist']}</h4></a>";
        $detail .= "<p>Category: {$row['category']}</p>";
        $detail .= "<p>Size: {$row['size']}</p>";
        $detail .= "<p>Price: $" . $row['price']."</p>";
        
        /*$detail .= "<form action='' method='GET'>
                        <button onclick='' type='submit' class=\"btn btn-success\">Add to Cart</button>
                    </form>";*/
         $detail.= " <a class='btn btn-success' href='artdetail.php?art_id=" . $row['art_id'] . "&action=add'>Add to cart</a>";
         
        //modal

    }
    $detail.= "</div></div>";

    return $detail;

}

$loadDetail = loadDetail($artid);

function zommImage($artid)
{
    global $connect;
    $loadContent = "SELECT * FROM artrepo where art_id='$artid'";
    $result = mysqli_query($connect, $loadContent);

    $zoomImage = "";
    while ($row = mysqli_fetch_assoc($result)) {

        $zoomImage .= "<div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                <button class=\"close\" data-dismiss=\"modal\">&times;</button>
                    <div class=\"modal-dialog modal-lg\">
                        <div class=\"modal-content\">
                            <div class=\"modal-body\"> 
                                <img class=\"col-sm-12 col-md-12 col-xs-12 img-responsive\" src='upload/" . $row['image_name'] . "'>
                            </div>
                        </div>
                    </div>
            </div>";

    }
    return $zoomImage;
}

$zoomImage = zommImage($artid);



?>
