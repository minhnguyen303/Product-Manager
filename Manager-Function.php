<?php
include_once 'Product.php';
include_once 'ProductManager.php';
include_once 'Data-Function.php';

const ACTION_ADD = 'add';
const ACTION_UPDATE = 'update';
const ACTION_DELETE = 'delete';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];

    $id = $_POST['id'];

    $manager = new ProductManager();
    $product = new Product($id,$_POST['name'],$_POST['category'],$_POST['amount'],$_POST['price'],$_POST['description'],$_POST['date'],$_POST['img']);

    switch ($action){
        case ACTION_ADD:
            addProduct($product);
            break;
        case ACTION_UPDATE:
            updateProduct();
            break;
        case ACTION_DELETE:
            deleteProduct(getIndexById($id));
            break;
    }
    header("Location: index.php");
}

function addProduct($product){
    $GLOBALS['manager']->add($product);
    saveData(objToArray($product));
}

function updateProduct($index, $product){

}

function deleteProduct($index){
    $GLOBALS['manager']->delete($index);
}

function getIndexById($id){
    foreach ($GLOBALS['manager'] as $key=>$value){
        if ($value->getId() == $id){
            return $key;
        }
    }
    return 0;
}