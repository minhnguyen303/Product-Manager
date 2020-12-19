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
    $data = loadData();
    foreach ($data as $value){
        $manager->add(arrayToObj($value));
    }

    $product = new Product($id,$_POST['name'],$_POST['category'],$_POST['amount'],$_POST['price'],$_POST['description'],date('d/m/Y'),$_POST['img']);

    switch ($action){
        case ACTION_ADD:
            addProduct($product);
            break;
        case ACTION_UPDATE:
            updateProduct(getIndexById($_POST['idOld']), $product);
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
    $listProducts = $GLOBALS['manager']->listProduct();
    $data = [];
    $listProducts[$index] = $product;
//    echo "<pre>";
//    var_dump($listProducts);
    foreach ($listProducts as $product) {
        array_push($data, objToArray($product));
    }
    saveData($data, true);
}

function deleteProduct($index){
    $GLOBALS['manager']->delete($index);
    $data = [];
    $listProducts = $GLOBALS['manager']->listProduct();
    foreach ($listProducts as $product) {
        array_push($data, objToArray($product));
    }
    saveData($data, true);
}

function getIndexById($id){
    $listProducts = $GLOBALS['manager']->listProduct();
    foreach ($listProducts as $key=>$value){
        if ($value->getId() == $id){
            return $key;
        }
    }
    return -1;
}

function getListProducts(){
    $list = [];
    $data = loadData();
    foreach ($data as $value){
        array_push($list, arrayToObj($value));
    }
    return $list;
}