<?php 
session_start();
include_once "db.php";


switch ($_POST['op']) {
    case 'add':
        add($con);
        break;
    
    case 'del':
        del($con);
        break; 

    case 'edit':
        edit($con);
        break;
}

function add($con){            
    $title= $_POST['title'];
    $content= $_POST['content'];
    $isImportant= $_POST['isImportant'] ? '1' : '0';
    $user=$_SESSION['user']; 
    $user_id= intval (mysqli_query($con, "SELECT id FROM users WHERE username='$user' ")->fetch_row()[0] ) ;

    $q = "INSERT INTO memos (user_id, title, content, isImportant, isArchived) VALUES ( '$user_id','$title','$content','$isImportant', '0') "; 
    mysqli_query($con, $q);
    header('Location: /index.php', true, 301);
    exit();

}

function del($con){
    $id=$_POST['id'];
    $q = "DELETE FROM memos WHERE id='$id' "; 
    mysqli_query($con, $q);
    header('Location: /index.php', true, 301);
    exit();
}

function edit($con){
    $id=$_POST['id'];
    $title= $_POST['title'];
    $content= $_POST['content'];
    $isImportant= $_POST['isImportant'] ? '1' : '0';

    $q = "UPDATE memos SET title='$title', content='$content', isImportant='$isImportant' WHERE id='$id' "; 
    mysqli_query($con, $q);
    header('Location: /index.php', true, 301);
    exit();

}








if (isset($_GET['memo'])) {
    $id= $_GET['memo'] ; 
    $row= mysqli_query($con,"SELECT * FROM memos WHERE id='$id'")->fetch_assoc();
    require_once('bootstrap/header.php');
    ?>

<form action="memo.php" method="post">
    
<input type="hidden" name="op" value="edit">
<input type="hidden" name="id" value="<?=$id?>">
    <div class="row p-1 ">
        <div class="col-3 "> 
            <h5 >Title: </h5>
        </div>
        <div class="col-9">
            <input class="w-100" type="text" name="title" value="<?=$row['title']?>">
        </div>
    </div>
    <div class="row p-1 ">
        <div class="col-3 "> 
            <h5 >Content: </h5>
        </div>
        <div class="col-9">
            <textarea class="w-100" name="content"   > <?=$row['content']?> </textarea> 
        </div>
    </div>
    <div class="row p-1 ">
    <div class="col-3 p-2 "> 
            <h5 >Is Important: </h5>
        </div>
        <div class="col-9  ">
        <input name="isImportant" type="checkbox" <?=  $row['isImportant'] ? 'checked' : ''?>  data-toggle="toggle" data-onstyle="primary">
        </div>


    </div>
    

    <div class="text-center ">
        <button class="btn btn-success  w-100" type="submit"> <h2 class="m-0" ><i class=" nc-icon nc-check-2"> </i>  </h2> </button>
    </div>

    </form>

<?php
    require_once('bootstrap/footer.php');

}
?>
