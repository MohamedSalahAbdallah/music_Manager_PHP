<?php

/**
 * Class storageManger
 * This class provides methods for CRUD operations on a JSON file.
 */
class storageManger
{
    /**
     * Adds data to a JSON file.
     *
     * @param array $data The data to be added.
     * @param string $fileName The name of the JSON file. Default is "data.json".
     * @return void
     */
    public function addToDataBase($data, $fileName = "data.json")
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Add the new data to the existing data array
            $existingDataArray[] = $data;

            // Convert the data array back to JSON and write it to the file
            $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
            file_put_contents($fileName, $jsonData);

            // Display a success message
            echo "Data added successfully";
        } else {
            // Display an error message if the file is not found
            return "Error: File not found";
        }
    }

    /**
     * Retrieves data from a JSON file.
     *
     * @param string $fileName The name of the JSON file. Default is "data.json".
     * @return mixed The data from the JSON file or an error message.
     */
    public function getFromDataBase($fileName = "data.json")
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Return the data array
            return $existingDataArray;
        } else {
            // Display an error message if the file is not found
            return "Error: File not found";
        }
    }

    /**
     * Updates data in a JSON file.
     *
     * @param array $data The updated data.
     * @param int $id The ID of the data to be updated.
     * @param string $fileName The name of the JSON file. Default is "data.json".
     * @return void
     */
    public function updateInDataBase($data, $id, $fileName = "data.json")
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Search for the data with the given ID
            foreach ($existingDataArray as $key => $value) {
                if ($value['id'] == $id) {
                    // Update the data with the given ID
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

    /**
     * Deletes data from a JSON file.
     *
     * @param int $id The ID of the data to be deleted.
     * @param string $fileName The name of the JSON file. Default is "data.json".
     * @return void
     */
    public function deleteFromDataBase($id, $fileName = "data.json")
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Search for the data with the given ID
            foreach ($existingDataArray as $key => $value) {
                if ($value['id'] == $id) {
                    // Delete the data with the given ID
                    unset($existingDataArray[$key]);
                    $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
                    file_put_contents($fileName, $jsonData);
                    echo "Data deleted successfully";
                    return;
                }
            }
            // Display an error message if the data is not found
            return "Error: Data not found";
        }
    }

    /**
     * Searches for data in a JSON file based on a field value.
     *
     * @param string $fieldName The name of the field to search on.
     * @param mixed $fieldValue The value of the field to search for.
     * @param string $fileName The name of the JSON file. Default is "data.json".
     * @return mixed The data with the matching field value or an error message.
     */
    public function searchInDataBase($fieldName, $fieldValue, $fileName = "data.json")
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Search for the data with the given field value
            foreach ($existingDataArray as $key => $value) {
                if ($value[$fieldName] == $fieldValue) {
                    // Return the data with the matching field value
                    return $value;
                }
            }
            // Display an error message if the data is not found
            echo "Error: Data not found";
            return;
        }
    }
}
