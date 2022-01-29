<?php
require 'config.php';
if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $statement = $pdo->prepare("UPDATE todo SET title='$title',description='$description' WHERE id=$id");
    $result = $statement->execute();

    if ($result) {
        echo "<script>alert('New Todo is added!');
                window.location.href='index.php';</script>";
    }
} else {
    $id = $_GET['id'];
    $statement = $pdo->prepare('SELECT * FROM todo WHERE id=:id');
    $statement->execute([':id' => $id]);
    $result = $statement->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body container">
            <h2>Edit Todo List</h2>
            <form action="" method="post">
                <input type="hidden" class="form-control" name="id" value="<?= $result[0]->id ?>">
                <div class="form-group mt-4">
                    <label for="" class="form-lable">Title</label>
                    <input type="text" class="form-control" name='title' value="<?= $result[0]->title ?>" required>
                </div>
                <div class="form-group mt-4">
                    <label for="" class="form-lable">Description</label>
                    <textarea name="description" rows="5" class="form-control"><?= $result[0]->description ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-primary" value="UPDATE">
                    <a href="index.php" type="button" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>