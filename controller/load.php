<?php include('connection.php'); ?>
<?php

//loads content
$loadContent = null;
$category = null;

if(isset($_GET['cat'])){
    $category = $_GET['cat'];
}

$selectCat = "SELECT category FROM artrepo where cat_id='$category'";
$result = mysqli_query($connect, $selectCat);
while($r = mysqli_fetch_assoc($result)){
    $cateName = $r['category'];
}
    function loadImage($category){
        global $connect;
        $loadContent = "SELECT * FROM artrepo where cat_id='$category'";
        $result = mysqli_query($connect, $loadContent);
        $image = "<div class=\"row\">";
        while($row = mysqli_fetch_assoc($result)) {
            $image .= "<div class=\"col-md-4 col-sm-6 col-sm-12\">";
            $image .= "<a href='artdetail.php?art_id=" . $row['art_id'] . "'><img src='upload/" . $row['image_name'] . "' class=\"img-responsive img-thumbnail\"></a><p>" .
                $row['artist'] . "</p></div>";
        }
        $image.= "</div>";

        return $image;

    }

    $loadContent = loadImage($category);

?>