
<?php 
        include "connect.php";
?>

<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content=";URL='<?php echo $page?>'">

    <!-- Bootstrap Cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- External Css -->
    <link rel="stylesheet" href="style.css">

    <!-- datatables css cdn -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <title>Prospect</title>
</head>
<body>

    <section id ="nav">
        <h1><br></h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Prospect Status</h3>
                    </div> 

                    <div class="card-body">

                        <form action="index.php" method="post" class="form form-floating">
                            
                            <input type="text" name="status" id="ControlInput1" class="form-control" required>

                            <input type="hidden" name="creator" id="creator">
                            <input type="hidden" name="date" id="date">
                            
                            <h5>
                                <input type="submit" class="btn btn-primary" name ="submit">
                                <input type="reset" class="btn btn-primary" name ="Cancel" value="Cancel">
                            </h5>          
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class=" card-outline card-warning">
                    <div class="card-header">
                        <h3 class="card-title">List of all Prospect</h3>
                    </div>

                    <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                <td>Edit</td>
                                <td>ID Number</td>
                                <td>Prospect Status</td>
                                <td>Created By</td>
                                <td>Create Date</td>
                                
                            </tr>
                        </thead>
    
                        <tbody>

                            <?php
                                $sql = "SELECT * FROM prospect";
                                $result = mysqli_query($con,$sql) or die("Query Failed");
                                $row= mysqli_fetch_assoc($result);
                                while($row=$result->fetch_assoc())
                                {
                            ?>
                            <tr>
                            <form action="edit.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <td><input class="btn btn-primary" name ="update" type="submit" value="Edit">
                            </form>

                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><?php echo $row['creator'];?></td>
                            <td><?php echo $row['date'];?></td>
                                    
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>   
                        </table>
                    </div>    
                </div>
                        </div>
            </div>
        </div>

    </section>
    
    <?php
    function function_alert($message) { 
    echo "<script>alert('$message');</script>";
}
?>

    <?php 
    if(isset($_POST['submit'])){
        $prospect=$_POST['status'];
        $creator=$_POST['creator'];
        $date = $_POST['date'];
        
        if (preg_match('/[^a-z_\-0-9]/i', $prospect)==true) {

            $sql = "INSERT INTO `prospect`.`prospect` (`status`, `creator`,`date`) VALUES ('$prospect','$creator',current_timestamp())";            
            if($con->query($sql)==true){
            echo "Data Inserted Successfully.";}
            $page = $_SERVER['PHP_SELF'];

        }
        else {

            function_alert(' DATA NOT INSERTED!!!\n Please enter the Prospect Status Correctly.\n It should be alpha-numeric only.');
            }
    }
    
    ?>


    <!-- Bootstrap js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <!-- datatables js cdn -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- datatables js function -->
    <script>
        $(document).ready( function () {
        $('.table').DataTable();
    } );</script>

</body>
</html>