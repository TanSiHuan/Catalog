<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.

        $isbn = '';
        $author = '';
        $title = '';
        $price = '';


    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['isbn']) && isset($_POST['author']) && isset($_POST['title']) && isset($_POST['price'])){
        $isbn = htmlspecialchars($_POST['isbn']) ;
        $author = htmlspecialchars($_POST['author']);
        $title = htmlspecialchars($_POST['title']);
        $price = htmlspecialchars($_POST['price']);
    }else{

    }

    // TODO 3: Setup a connection to the appropriate database.
    include 'config.php';

    // TODO 4: Query the database.
    $sql = $conn->query("INSERT INTO catalogs(isbn, author, title,price) VALUES ('$isbn','$author','$title','$price')") or die($conn->error);


    // TODO 5: Display the feedback back to user.
    if($sql == TRUE){
        echo '<script type="text/javascript">';
        echo 'alert("Successful insert");';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("Fail to insert");';
        echo '</script>';
    }
    echo $sql;

    // TODO 6: Disconnecting from the database.
    $conn ->close();

    ?>
</body>
</html>