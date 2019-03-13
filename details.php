<?php
    include('config/db_connect.php');

    //delete a record from database
    if(isset($_GET['id_to_delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_GET['id_to_delete']);

        $sql = "DELETE FROM noodles WHERE id = $id_to_delete";
        if(mysqli_query($conn, $sql)) {
            header('Location: index.php');
        } else {
            'Query error: ' . mysqli_error($conn);
        };
    }

    //check GET request id param
    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //make sql query
        $sql = "SELECT * FROM noodles WHERE id = $id";

        //get the query result
        $result = mysqli_query($conn, $sql);

        //fetch associated result in an array format
        $noodle = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center">
        <?php if($noodle): ?>
            <h4><?php echo htmlspecialchars($noodle['noodleName']) ?></h4>
            <p>Created by: <?php echo htmlspecialchars($noodle['email']) ?></p>
            <p>Created at: <?php echo htmlspecialchars($noodle['created_at']) ?></p>
            <h5><?php echo htmlspecialchars($noodle['ingredients']) ?></h5>

            <!-- Delete Form -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                <input type="hidden" name="id_to_delete" value="<?php echo $noodle['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand">
            </form>
        <?php else: ?>
            <h5>No such noodle currently</h5>
        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>