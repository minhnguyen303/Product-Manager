<?php
include_once 'Product.php';

const FILENAME = 'data.json';

function objToArray($obj)
{
    return [$obj->getId(), $obj->getName(), $obj->getCategory(), $obj->getAmount(), $obj->getPrice(), $obj->getDescription(), $obj->getDate(), $obj->getImg()];
}

function saveData($data)
{
    $oldData = loadData();
    array_push($oldData, $data);

    $dataJson = json_encode($oldData);
    file_put_contents(FILENAME, $dataJson);
}

function loadData()
{
    $dataJson = file_get_contents(FILENAME);
    return json_decode($dataJson, true);
}