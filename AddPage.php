<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<form action="Manager-Function.php" method="post">
    <input type="text" name="action" value="add" hidden>
    <fieldset>
        <legend>Add Product</legend>
        <table id="addTable">
            <tr>
                <th class="inputAdd">Id</th>
                <th class="inputAdd"><input type="text" maxlength="5" name="id" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Name</th>
                <th class="inputAdd"><input type="text" name="name" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Category</th>
                <th class="inputAdd"><input type="text" name="category" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Amount</th>
                <th class="inputAdd"><input type="number" name="amount" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Price</th>
                <th class="inputAdd"><input type="number" name="price" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Description</th>
                <th class="inputAdd"><input type="text" name="description" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Date created</th>
                <th class="inputAdd"><input id="date" type="text" name="date" disabled required></th>
            </tr>
            <tr>
                <th class="inputAdd">Image link</th>
                <th class="inputAdd"><input type="text" name="img" required></th>
            </tr>
            <tr>
                <th class="inputAdd" colspan="2"><button type="submit" class="submitBtn">Add</button></th>
            </tr>
        </table>
    </fieldset>
</form>
<script>
    document.getElementById('date').value = '<?php echo date('d/m/Y')?>';
</script>
</body>
</html>
