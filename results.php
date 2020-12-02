<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $searchtype = '';
    $searchterm = '';

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['searchtype']) && isset($_POST['searchterm'])){
        $searchterm = $_POST['searchterm'];
        $searchtype = $_POST['searchtype'];
    }

    // TODO 3: Setup a connection to the appropriate database.
        include ('config.php');

    // TODO 4: Query the database.



    // TODO 5: Retrieve the results.
    ?>
    <table border="1">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Isbn</th>
                <th>Price</th>
            </tr>

    <?php
    if($searchtype == 'author'){
        $sql = "SELECT * from catalogs WHERE author LIKE '%$searchterm'";
    }
    if ($searchtype == 'title'){
        $sql = "SELECT * from catalogs WHERE title LIKE '%$searchterm'";

    }
    if ($searchtype == 'isbn'){
        $sql = "SELECT * from catalogs WHERE isbn LIKE '%$searchterm'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    ?>
<!--        TODO 6: Display the results back to user.-->
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['author'] ?></td>
            <td><?php echo $row['isbn'] ?></td>
            <td><?php echo $row['price'] ?></td>
        </tr>
    <?php
        }
    }
    // TODO 7: Disconnecting from the database.
    $conn ->close();

    ?>
    </table>
</body>
</html>