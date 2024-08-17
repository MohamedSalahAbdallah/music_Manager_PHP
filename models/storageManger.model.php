<?php


class storageManger
{


    public function addToDataBase($data, $fileName)
    {
        //add in json
        if (file_exists($fileName)) {
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);
            $existingDataArray[] = $data;
            $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
            file_put_contents($fileName, $jsonData);
            echo "Data added successfully";
        } else {
            return "Error: File not found";
        }
    }



    public function getFromDataBase($fileName)
    {
        if (file_exists($fileName)) {
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);
            return $existingDataArray;
        } else {
            return "Error: File not found";
        }
    }


    public function updateInDataBase($data, $id, $fileName)
    {
        if (file_exists($fileName)) {
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);
            foreach ($existingDataArray as $key => $value) {
                if ($value['id'] == $id) {
                    $existingDataArray[$key] = $data;
                    $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
                    file_put_contents($fileName, $jsonData);
                    echo "Data updated successfully";
                    return;
                } else {
                    echo "Error: Data not found";
                }
            }
        }
    }


    public function deleteFromDataBase($id, $fileName)
    {
        if (file_exists($fileName)) {
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);
            foreach ($existingDataArray as $key => $value) {
                if ($value['id'] == $id) {
                    unset($existingDataArray[$key]);
                    $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
                    file_put_contents($fileName, $jsonData);
                    echo "Data deleted successfully";
                    return;
                }
            }
            return "Error: Data not found";
        }
    }

    public function searchInDataBase($id, $fileName)
    {
        if (file_exists($fileName)) {
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);
            foreach ($existingDataArray as $key => $value) {
                if ($value['id'] == $id) {
                    return $value;
                } else {
                    echo "Error: Data not found";
                }
            }
        }
    }
}
