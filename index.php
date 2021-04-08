<?php require_once("./bootstrap/header.php") ;
session_start();
 ?>
 <div class="card bg-warning w-50 m-auto p-3">

    <h2 > Create New Memo</h3>
    <hr>
    
    <form action="memo.php" method="post">
    <input type="hidden" name="op" value="add">
    <div class="row p-1 ">
        <div class="col-3 "> 
            <h5 >Title: </h5>
        </div>
        <div class="col-9">
            <input class="w-100" type="text" name="title" placeholder="title">
        </div>
    </div>
    <div class="row p-1 ">
        <div class="col-3 "> 
            <h5 >Content: </h5>
        </div>
        <div class="col-9">
            <textarea class="w-100" name="content"   placeholder="Enter your content here" ></textarea> 
        </div>
    </div>
    <div class="row p-1 ">
    <div class="col-3 p-2 "> 
            <h5 >Is Important: </h5>
        </div>
        <div class="col-9  ">
        <input name="isImportant" type="checkbox" checked data-toggle="toggle" data-onstyle="primary">
        </div>


    </div>
    

    <div class="text-center ">
        <button class="btn btn-success" type="submit"> Add </button>
        <button class="btn btn-danger btn-rnd"  type="reset"> Clear</button>
    </div>
    </form>
</div>

<br><br> <hr> <br><br> 

<?php
    $user= $_SESSION['user'] ;
    $user_id = mysqli_query($con, "SELECT id FROM users WHERE username='$user' ")->fetch_row()[0] ; 
    $result= mysqli_query($con,"SELECT * FROM memos WHERE user_id='$user_id'");
    
    
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