<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="edit.css">
    <!-- Bootstrap CSS cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>
<body>
    <!-- Bootstrap js cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <section id ="nav">
        <h1><br></h1>
        <a href="index.php" class="back"><button>Go Home</a>
    </section>

<?php
include "connect.php";

    if(isset($_POST["update"])){
    
    $id = $_POST["id"];
    
    $up = ("SELECT * FROM prospect WHERE id ='$id'");

    $result = mysqli_query($con,$up);

    if($result){
        while($row=mysqli_fetch_array($result))
        {
            ?>
    <section class="edit" class="form-floating">

    <form action="edit.php" method="post" >
        <div class="form">
            
            <input type="hidden" name="id" placeholder="id" value="<?php echo $row["id"]?>">

            <div class="title">
                <label for="ControlInput1" >Prospect Status</label>
                <input type = "text"  name="status" class="form-control" id="ControlInput1" value="<?php echo $row["status"];?>">
            </div>

            <div class="description">
                <input type="hidden" name = 'creator' placeholder="<?php echo $row["creator"];?>"></textarea>
            </div>

            <div class="date">
            <input type = "hidden" name="date" id="date" required value="<?php echo $row["date"];?>">
            </div>
        </div>

            <div class="button">
            <button type="submit" class="btn btn-primary" name="updated" onclick="return confirm('Are you sure you want to update the data ?')">Update</button>
            <button name="cancel" class="btn btn-primary">Cancel</button>
            </div>
    </form>
    
    </section>

            <?php 
        }}
    
    else {
        echo "Check Update Part";  }
    }

?>

</body>
</html>

<?php
include "connect.php";

if (isset($_POST['cancel'])){
    echo"no data updated";
    header("location:index.php");
}

if(isset($_POST['updated'])){
                $status = $_POST['status'];

                $creator = $_POST['creator'];
                
                $date = $_POST['date'];

                $id = $_POST['id'];

                $query = "UPDATE prospect SET status = '$status', creator = '$creator', date = current_timestamp() WHERE id ='$id' ";
                
                $re = mysqli_query($con,$query);

                if($re){
                    echo $query;
                }
                else {
                    echo "Nope, Its Not Updated!!".mysqli_error($con);  
                }}
?>