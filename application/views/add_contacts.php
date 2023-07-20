<!DOCTYPE html>
<html>
<head>
      <title>Add contact</title>
</head>
<body>
    <a href="/contacts">Go back</a>
<?php
    if(isset($errors)) {
        echo $errors;
    }
?>
    <h1>Add new contact</h1>
    <form action="/contacts/create" method="post">
        <label>Name:</label>
        <input type="text" name="name">
        <label>Contact number:</label>
        <input type="number" name="number">
        <input type="submit" value="Create">
    </form>

</body>
</html>