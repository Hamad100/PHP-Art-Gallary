<?php include('connection.php'); ?>
<?php
//delete comment by id
if(isset($_GET['comment_id'])){
    $commentid= $_GET['comment_id'];
    function deleteComment($commentid){
        global $connect;
        $commentid = $_GET['comment_id'];
        mysqli_query($connect,"DELETE FROM comment WHERE comment_id='$commentid' AND name='" .$_SESSION['username']. "'");
        //header("location: artdetail.php");
    }
    $deleteComment = deleteComment($commentid);
}

//insert to comment table
if(isset($_POST['commentform'])) {
    $comment = $_POST['comment'];
    //$memberid = $_POST['member_id'];

    mysqli_query($connect, "INSERT INTO comment(comment,art_id,name) VALUES('$comment','$artid','". $_SESSION['username'] ."')");

}
$result = mysqli_query($connect, "SELECT * FROM comment WHERE art_id='$artid' ORDER BY comment_id ASC");
$commentContent = "<div class='col-sm-12 commentbox'>";
while($row=mysqli_fetch_array($result)){
    $commentContent.= "<p><img class='img' src=\"images/placeholder-user.png\">";
    $commentContent.=  "<b><a href='#' class='commenter text-capitalize'>" .$row['name'] . "</a></b></p>";
    $commentContent.= "<div class='comment col-sm-12'><p>" . $row['comment'] . "</p></div>";
    $commentContent.= "<div class='delete col-sm-12'><a href='artdetail.php?art_id=$artid&comment_id=" .$row['comment_id'] . "'>Delete</a><a> |" . date("F d, Y h:i A",strtotime($row['comment_date'])) ." </a></div>";
}
$commentContent .= "</div>";
//mysqli_close($con);

?>
