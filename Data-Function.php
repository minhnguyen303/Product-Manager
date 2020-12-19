<?php
include_once 'Product.php';

const FILENAME = 'data.json';

function objToArray($obj)
{
    return [$obj->getId(), $obj->getName(), $obj->getCategory(), $obj->getAmount(), $obj->getPrice(), $obj->getDescription(), $obj->getDate(), $obj->getImg()];
}

function saveData($data, $isReplace = False)
{
    if ($isReplace){
        $dataJson = json_encode($data);
        file_put_contents(FILENAME, $dataJson);
    }
    else{
        $oldData = loadData();
        array_push($oldData, $data);

        $dataJson = json_encode($oldData);
        file_put_contents(FILENAME, $dataJson);
    }

}

function loadData()
{
    $dataJson = file_get_contents(FILENAME);
    return json_decode($dataJson, true);
}

function arrayToObj($array){
    return new Product($array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[7]);
}