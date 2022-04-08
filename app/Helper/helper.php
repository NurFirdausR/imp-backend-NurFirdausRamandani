<?php 

function searchByValue($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['id'] === $id) {

            $resultSet[] = $val;
            //  $resultSet[''] = $val['id'];
            return $resultSet;
        }
    }
    return null;
}