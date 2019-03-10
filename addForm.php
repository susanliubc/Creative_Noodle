<?php

    $email=$noodleName=$ingredients='';
    $errors = array('email' => '', 'noodleName' => '', 'ingredients' => '' );

    if(isset($_POST['submit'])) {

        //check email
        if(empty($_POST['email'])) {
            $errors['email'] = 'Email is required';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email address must be valid';
            } 
        };
        
        //check noodle name
        if(empty($_POST['noodleName'])) {
            $errors['noodleName'] = 'Noodle name is required';
        } else {
            $noodleName = $_POST['noodleName'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $noodleName)) {
                $errors['noodleName'] = 'Noodle name must include only letters and space';
            };   
        };
        
        //check ingredients
        if(empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'At least one ingredient is required';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients'] = 'Ingredients must be comma seperated list';
            };
        };
    };
?>

<section class="container grey-text text-darken-2">
    <h3 class="center">Add a noodle</h3>
    <form action="addForm.php" class="container" method="POST">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label>Noodle Name</label>
        <input type="text" name="noodleName" value="<?php echo htmlspecialchars($noodleName) ?>">
        <div class="red-text"><?php echo $errors['noodleName'] ?></div>
        <label>Ingredients (Comma seperated) </label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>
        <div class="center">
            <input type="submit" name="submit" class="btn brand">
        </div>
    </form>
</section>


