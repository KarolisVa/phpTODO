<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $id = $_GET['U_ID'];
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
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <div class="d-flex justify-content-between m-auto w-75"><a href="view.php">VIEW</a> <a href="index.php">ADD</a></div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="ID" value="<?php echo $data['ID']; ?>">
                                <input type="text" name="Task" placeholder=" Task Name" class="form-control mb-2" required value="<?php echo $data['Task']; ?>">
                                <input type="text" name="ByWho" placeholder=" Posed by" class="form-control mb-2" required value="<?php echo $data['ByWho']; ?>">
                                <input type="text" name="Description" placeholder=" Description" class="form-control mb-2" required value="<?php echo $data['Description']; ?>">
                                 <div class="form-control mb-2">
                                <label>important?</label>
                                <select name="Important">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                </div>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>