<?php
require 'config.php';
$statement = $pdo->prepare('SELECT * FROM todo ORDER BY id DESC');
$statement->execute();
$result = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="card">
        <div class="card-body container">
            <h2>Home Page</h2>
            <a type="button" href="add.php" class="btn btn-success">Create New</a><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result) :
                        $i = 1;
                        foreach ($result as $value) :
                    ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value->title ?></td>
                                <td><?= $value->description ?></td>
                                <td><?= date('Y-m-d', strtotime($value->created_at)) ?></td>
                                <td>
                                    <a type="button" href="edit.php?id=<?= $value->id ?>" class="btn btn-secondary">Edit</a>
                                    <a type="button" href="delete.php?id=<?= $value->id ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php $i++;
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>