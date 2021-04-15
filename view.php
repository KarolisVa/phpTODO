<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $result=$db->view_record();
    // $data = mysqli_fetch_assoc($result);
    // print_r($data);

    // if(isset($_POST["btn_search"])){
    //     print_r($_POST);
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Crud Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Tasks </h2>
                    </div>
                    <div class="d-flex justify-content-between m-auto w-75"><a href="view.php">VIEW</a> <a href="index.php">ADD</a></div>
                    <form class="m-auto" method="POST">
                     <h2 class="text-center">Search</h2>
                     <input  name="search"></input>
                     <button class="btn btn-info" name="btn_search">search</button>
                    </form>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> ID </td>
                                <td style="width: 10%"> Task </td>
                                <td style="width: 10%" colspan="2">Manage</td>
                                <td style="width: 5%" colspan="2">More</td>
                            </tr>
                            <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                         if(isset($_POST["btn_search"]) && $_POST["btn_search"] == ""){
 
                                             if(!str_contains($data['Task'], $_POST["search"])){
                                                continue;
                                             }
                                        }
                            ?>
                                    <td><?php echo $data['ID'] ?></td>
                                    <td><?php echo $data['Task'] ?></td>
                                    <td><a href="edit.php?U_ID=<?php echo $data['ID'] ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="del.php?D_ID=<?php echo $data['ID'] ?>" class="btn btn-danger">Del</a></td>
                                    <td><a href="more.php?M_ID=<?php echo $data['ID'] ?>" class="btn btn-info">More</a></td>
                            </tr>
                            <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>