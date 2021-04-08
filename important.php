<?php require_once("./bootstrap/header.php") ?>


<?php
    $user= $_SESSION['user'] ;
    $user_id = mysqli_query($con, "SELECT id FROM users WHERE username='$user' ")->fetch_row()[0] ; 
    $result= mysqli_query($con,"SELECT * FROM memos WHERE user_id='$user_id' AND isImportant='1' ");
    
    
    while ($row = mysqli_fetch_row($result)) {
    
?>
<div class="card m-5 p-3 <?php echo $row[4] ?  'bg-danger' :  'bg-warning' ?> ">
        <h5> <?=  $row[4] ?  '<i class=" nc-icon nc-bookmark-2"> </i> ' . $row[2] :  '<i class=" nc-icon nc-paper"> </i> ' . $row[2] ?> </h5> <br> 
        <p>  <?= $row[3] ?> </p>
        <div class="text-center">
            <form action="memo.php" method="post">
            <input type="hidden" name="op" value="del">
            <input type="hidden" name="id" value="<?=$row[0]?>">
            <button class="btn btn-secondary " type="submit"> <i class="nc-icon nc-simple-remove"> | Delete </i> </button>

            <a class="btn btn-info" href="memo.php?memo=<?= $row[0] ?>"> <i class="nc-icon nc-ruler-pencil"> | Edit</i> </a>
            </form>
        </div>
</div>

<?php
    }
?>

<?php require_once("./bootstrap/footer.php") ?>