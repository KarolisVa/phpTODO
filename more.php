<?php

require_once('./config/dbconfig.php');
$db = new operations();

$id = $_GET['M_ID'];
$result = $db->get_record($id);
$data = mysqli_fetch_assoc($result);
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
                    <h2 class="text-center text-dark"> More about: <?php echo $data['Task'] ?> </h2>
                </div>
                <div class="d-flex justify-content-between m-auto w-75"><a href="view.php">VIEW</a> <a href="index.php">ADD</a></div>
                <div class="card-body">
                    <?php
                    $db->display_message();
                    $db->display_message();
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 10%"> ID </td>
                            <td style="width: 10%"> Task </td>
                            <td style="width: 20%"> By Who </td>
                            <td style="width: 20%"> Description </td>
                            <td style="width: 10%"> Important </td>
                        </tr>
                        <tr>
                            <td><?php echo $data['ID'] ?></td>
                            <td><?php echo $data['Task'] ?></td>
                            <td><?php echo $data['ByWho'] ?></td>
                            <td><?php echo $data['Description'] ?></td>
                            <td><?php echo $data['Important'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>