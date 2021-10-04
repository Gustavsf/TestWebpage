<?php
    //Connect to db
    require('dbConnect.php');
    $connection = new Connection;
    $conn = $connection->connectDB();

    //Sort and filter
    require('filters.php');
    $sorter = new FilterSort;
    $LIKE = $sorter->filterByLike($conn);
    $ORDERBY = $sorter->filterBySort();
    //Update view   
    $result = $connection->updateView($LIKE, $ORDERBY);
    $emailArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Get email adresses
    $emailProviders = $sorter->getAdress($emailArray);

    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styleDB.css">
    <title>Email List</title>
</head>
<body>
    <a href="index.php">Back to main</a>
    <div id="filters">
        <div id="emails">
            <form action="" method="post">
            <input type="submit" id='btn-filter' value="APPLY FILTERS / RESET">
                <label for="email_search">Search:</label>
                <input type="text" name="email_search"> <br> 
            <?php               
            foreach($emailProviders as $name){ ?>
                <div id="filter_box">
                    <label for="filter_by_email"><?php echo $name ?></label>
                    <input type="checkbox" name ="filter_by_email" value="<?php echo $name ?>">
                </div>                                                             
            <?php
            }
            ?>               
        </div>
    </div>
    <table>  
        <tr>
            <th>ID</th>
            <th>
                <label for="email_sortA">A > Z</label>
                <input type="checkbox" name ="email_sortA" value="A > Z">
                <label for="email_sortB">Z > A</label>
                <input type="checkbox" name ="email_sortB" value="Z > A">           
            </th>
            <th>
                <label for="date_sortA">OLD</label>
                <input type="checkbox" name ="date_sortA" value="OLD">
                <label for="date_sortA">NEW</label>
                <input type="checkbox" name ="date_sortB" value="NEW">
            </th>
            <th>DELETE</th>                
        </tr>
        </form>
    <?php foreach($emailArray as $email){ ?>
        <tr>
        <form action="datalist.php" method="POST">
            <td><?php echo htmlspecialchars($email['id']) ?></td>
            <td><?php echo htmlspecialchars($email['email']) ?></td>
            <td><?php echo htmlspecialchars($email['created_date']) ?></td>
            <td>                   
                <input type="hidden" name="id_delete" value="<?php echo htmlspecialchars($email['id']) ?>">
                <input type="submit" name ="delete" value="Delete">                  
            </td>
        </form>
        </tr>           
    <?php } ?>
    </table>      
</body>
</html>