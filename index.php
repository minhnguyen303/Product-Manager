<?php
include_once "Product.php";
include_once 'ProductManager.php';
include_once 'Data-Function.php';

$manager = new ProductManager();
$data = loadData();
foreach ($data as $value){
    $product = new Product($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7]);
    $manager->add($product);
}
$listProducts = $manager->listProduct();


?>
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
<form action="" method="post">
    <table>
        <caption>From: <input id="123" type="date" name="searchFrom" required>
            To: <input type="date" name="searchTo" required>
            <button class="submitBtn" type="submit" onclick="test()">Search</button>
        </caption>
    </table>
</form>
<table id="listTable">
    <caption><h2>Danh sách mặt hàng</h2><a href="AddPage.php"><button id="addBtn">Add Product</button></a></caption>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Amount</th>
        <th>Price</th>
        <th>Description</th>
        <th>Date Created</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php if (count($listProducts)):?>
        <?php foreach ($listProducts as $product): ?>
            <tr>
                <td><?php echo $product->getId() ?></td>
                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getCategory() ?></td>
                <td><?php echo $product->getAmount() ?></td>
                <td><?php echo $product->getPrice() ?></td>
                <td><?php echo $product->getDescription() ?></td>
                <td><?php echo $product->getDate() ?></td>
                <td><?php echo $product->getImg() ?></td>
                <td>
                    <form id="editForm" action="EditPage.php" method="post" style="display: inline">
                        <input type="text" name="id" value="<?php echo $product->getId() ?>" hidden>
                        <input type="text" name="action" value="edit" hidden>
                        <button type="submit" form="editForm">Edit</button>
                    </form>
                    <form id="deleteForm" action="Manager-Function.php" method="post" style="display: inline">
                        <input type="text" name="id" value="<?php echo $product->getId() ?>" hidden>
                        <input type="text" name="action" value="delete" hidden>
                        <button type="submit" form="deleteForm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">No Data</td>
        </tr>
    <?php endif; ?>
</table>
<script>
    function test(){
        alert(document.getElementById('123').value)
    }
</script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $searchFrom = $_POST['searchFrom'];
    $searchTo = $_POST['searchTo'];

    
}