<?php
require 'config.php';
if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    echo $title;
    echo $description;
    $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
    $statement = $pdo->prepare($sql);
    $result= $statement->execute([
        ':title' => $title,
        ':description' => $description
    ]);
    if($result){
        echo "<script>alert('New Todo is added!');
                window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-body container">
            <h2>Create New Todo List</h2>
            <form action="add.php" method="post">
                <div class="form-group mt-4">
                    <label for="" class="form-lable">Title</label>
                    <input type="text" class="form-control" name='title' required>
                </div>
                <div class="form-group mt-4">
                    <label for="" class="form-lable">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" type="button" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>