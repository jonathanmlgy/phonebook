<!DOCTYPE html>
<html>
<head>
      <title>Bookmark</title>
</head>
<body>
    <h1>Add a Bookmark!</h1>
    <form action="/bookmarks/form" method="post">
        <label>Name:</label>
        <input type="text" name="name">
        <label>URL:</label>
        <input type="url" name="url">
        <label>Folder:</label>
        <select name="folder">
            <option value="favorites">Favorites</option>
            <option value="others">Others</option>
        </select>
        <input type="submit" value="Add">
    </form>
<?php
    if(isset($errors)){
        echo $errors;
    }
    if(isset($bookmarks)) {
?>
    <table>
        <tr>
            <th>Folder</th>
            <th>Name</th>
            <th>URL</th>
            <th>Action</th>
        </tr>
<?php   for($index = 0; $index < count($bookmarks); $index++) {
?>
        <tr>
            <td><?=$bookmarks[$index]['folder']?></td>
            <td><?=$bookmarks[$index]['name']?></td>
            <td><?=$bookmarks[$index]['url']?></td>
            <td><a href="/bookmarks/destroy/<?=$bookmarks[$index]['id']?>">Destroy</a><td>
        </tr>
<?php   }
?>
    </table>
<?php
    }
?>
</body>
</html>