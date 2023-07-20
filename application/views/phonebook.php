<!DOCTYPE html>
<html>
<head>
      <title>Phonebook</title>
</head>
<body>
    <h1>Contacts</h1>
<?php
    if(isset($contacts)) {
?>
    <table style="border:1px solid black">
        <tr>
            <th>Name</th>
            <th>Contact number</th>
            <th>Actions</th>
        <tr>
<?php   for($index = 0; $index < count($contacts); $index++) {
?>
        <tr>
            <td><?=$contacts[$index]['name']?></td>
            <td><?=$contacts[$index]['contact_number']?></td>
            <td>
                <a href="/contacts/show/<?=$contacts[$index]['id']?>">Show</a>
                <a href="/contacts/edit/<?=$contacts[$index]['id']?>">Edit</a>
                <a href="/contacts/destroy/<?=$contacts[$index]['id']?>">Remove</a>
            </td>
        </tr>
<?php   }
?>
    </table>
<?php
    }
?>
    <a href="/contacts/new">Add new contact</a>
</body>
</html>