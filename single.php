<?php

include_once 'return.php';

$updated_posts = getPosts();

$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php foreach ($updated_posts as $post) :  ?>
        <?php if ($post['i'] == $id) : ?>
            <div class="container">
                <h1>Post</h1>
                <hr>
                <a href="test.php">Back</a>
                <br>
                <ul class="list-group list-group-flash">
                    <li class="list-group-item">
                        <a href="single.php?id=<?php echo $post['i'] ?>"><?php echo $post['i'] ?></a>
                        <div class="row">
                            <div class="col-md-12">
                                <h3><?php echo $post['mr']; ?></h3>
                                <p><?php echo $post['r']; ?></p>
                                <?php for ($i = 1; $i < 5; $i++) : ?>
                                    <p><?php echo $post['d'][$i]['l'] . ': ' . $post['d'][$i]['v']; ?></p>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    <?php endforeach ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>