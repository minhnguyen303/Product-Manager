<?php
include_once "Data-Function.php";
include_once "Product.php";
include_once "ProductManager.php";
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
<form action="Manager-Function.php" method="post">
    <input type="text" name="action" value="update" hidden>
    <input type="text" name="idOld" value="<?php echo $_POST['id']; ?>" hidden>
    <fieldset>
        <legend>Edit Product</legend>
        <table id="editTable">
            <tr>
                <th class="inputAdd">Id</th>
                <th class="inputAdd"><input id="id" type="text" maxlength="5" name="id" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Name</th>
                <th class="inputAdd"><input id="name" type="text" name="name" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Category</th>
                <th class="inputAdd"><input id="category" type="text" name="category" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Amount</th>
                <th class="inputAdd"><input id="amount" type="number" name="amount" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Price</th>
                <th class="inputAdd"><input id="price" type="number" name="price" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Description</th>
                <th class="inputAdd"><input id="description" type="text" name="description" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Date created</th>
                <th class="inputAdd"><input id="date" type="text" name="date" placeholder="Fomat: dd/mm/YYYY" required></th>
            </tr>
            <tr>
                <th class="inputAdd">Image link</th>
                <th class="inputAdd"><input id="img" type="text" name="img" required></th>
            </tr>
            <tr>
                <th class="inputAdd" colspan="2"><button type="submit" class="submitBtn">Update</button></th>
            </tr>
        </table>
    </fieldset>
</form>
<script>
    document.getElementById('date').value = '<?php echo date('d/m/Y')?>';
</script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $id = $_POST['id'];
    $editProduct = null;

    if($action = "edit"){
        $manager = new ProductManager();
        $data = loadData();
        foreach ($data as $value){
            $manager->add(arrayToObj($value));
        }

        foreach ($manager->listProduct() as $product){
            if ($product->getId() == $id){
                $editProduct = $product;
            }
        }

        $name = $editProduct->getName();
        $category = $editProduct->getCategory();
        $amount = $editProduct->getAmount();
        $price = $editProduct->getPrice();
        $description = $editProduct->getDescription();
        $date = $editProduct->getDate();
        $img = $editProduct->getImg();

        $script = "<script>
            document.getElementById('id').value = '$id';
            document.getElementById('name').value = '$name';
            document.getElementById('category').value = '$category';
            document.getElementById('amount').value = '$amount';
            document.getElementById('price').value = '$price';
            document.getElementById('description').value = '$description';
            document.getElementById('date').value = '$date';
            document.getElementById('img').value = '$img';
        </script>";
        echo $script;
    }
}
