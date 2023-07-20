<!DOCTYPE html>
<html>
<head>
      <title>Edit contact</title>
</head>
<body>
    <a href="/contacts">Go back</a>
    <a href="/contacts/show/<?=$edit_id?>">Show</a>
<?php
    if(isset($errors)) {
        echo $errors;
    }
?>
    <h1>Edit contact #<?=$edit_id?></h1>
    <form action="/contacts/update/<?=$edit_id?>" method="post">
        <label>Name:</label>
        <input type="text" name="name">
        <label>Contact number:</label>
        <input type="number" name="number">
        <input type="submit" value="Save">
    </form>

</body>
</html>