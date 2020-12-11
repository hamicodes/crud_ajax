<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <title>CRUD</title>
</head>
<body>

<?php require_once 'process.php'?>

<div class="alert alert-success" style="display:none" role="alert">

</div>

<div class="container" style="height:100vh; padding:50px;">
    <h1 class="pb-5">CRUD PRACTICE</h1>

<div class="row">
    <div class="col-8">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Location</th>
                <th scope="col">Modify</th>
                </tr>
            </thead>
            <tbody>

                <?php 

                $rd_arr = $con -> query("SELECT * FROM crud");

                while ($row = $rd_arr -> fetch_assoc()): ?>
                <tr id="<?= $row['id']?>">
                    <td><?= $row['id']?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['age']?></td>
                    <td><?= $row['location']?></td>
                <td> 
                    <button class="btn btn-primary edit" value="<?php echo $row['id']?>" >Edit</button>
                    <button class="btn btn-danger delete" value="<?php echo $row['id']?>">Delete</button>
                </td>
                </tr>
                <?php endwhile ?> 

            </tbody>
        </table>
    </div>

    <div class="col-4">
        <form action="javascript:void(0)";>
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" id="name" aria-describedby="name-input" name="name" value="<?= $name ?>" placeholder="Enter your name">
            </div>
        
            <div class="form-group">
                <label for="age">Age: </label>
                <input type="text" class="form-control" id="age" name="age" value="<?= $age ?>" placeholder="Enter your age">
            </div>
        
            <div class="form-group">
                <label for="location">Location: </label>
                <input type="text" class="form-control" id="location" name="location" value="<?= $location ?>" placeholder="Enter your location">
            </div>
                <button type="button" class="btn btn-primary update" name="update" value="">Create</button>
        </form>
    </div>
</div>
</div>

    
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>