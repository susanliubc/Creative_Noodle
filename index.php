<?php 
    include('config/db_connect.php');
    
    //write a query for all the noodles
    $sql = 'SELECT noodleName, ingredients, id FROM noodles ORDER BY noodleName';

    //make a query and get results from it
    $results = mysqli_query($conn, $sql);

    //fetch the result rows as an array in a readable form
    $noodles = mysqli_fetch_all($results, MYSQLI_ASSOC);

    //remove result from memory
    mysqli_free_result($results);

    //close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <h4 class="center green-text">Your Noodles</h4>
    <div class="container">
        <div class="row">
            <?php foreach($noodles as $noodle): ?>
                <div class="col s6 md3">
                    <div class="card">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($noodle['noodleName']) ?></h6>
                            <ul>
                                <?php foreach(explode(',', $noodle['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $noodle['id'] ?>">More Info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>