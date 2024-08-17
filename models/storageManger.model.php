<?php

/**
 * This class is a storage manager that handles the basic operations (CRUD) on JSON files.
 */
class storageManger
{
    /**
     * Adds data to a JSON file.
     *
     * @param array $data The data to be added.
     * @param string $fileName The name of the JSON file.
     * @return void
     */
    public function addToDataBase($data, $fileName)
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Append the new data to the existing data array
            $existingDataArray[] = $data;

            // Encode the array back to JSON format and write it back to the file
            $jsonData = json_encode($existingDataArray, JSON_PRETTY_PRINT);
            file_put_contents($fileName, $jsonData);

            // Display success message
            echo "Data added successfully";
        } else {
            // Return error message if the file does not exist
            return "Error: File not found";
        }
    }

    /**
     * Retrieves data from a JSON file.
     *
     * @param string $fileName The name of the JSON file.
     * @return mixed The data from the JSON file or an error message.
     */
    public function getFromDataBase($fileName)
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Return the data from the JSON file
            return $existingDataArray;
        } else {
            // Return error message if the file does not exist
            return "Error: File not found";
        }
    }

    /**
     * Updates data in a JSON file.
     *
     * @param array $data The updated data.
     * @param int $id The ID of the data to be updated.
     * @param string $fileName The name of the JSON file.
     * @return void
     */
    public function updateInDataBase($data, $id, $fileName)
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Find the data with the given ID and update it
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

    /**
     * Deletes data from a JSON file.
     *
     * @param int $id The ID of the data to be deleted.
     * @param string $fileName The name of the JSON file.
     * @return void
     */
    public function deleteFromDataBase($id, $fileName)
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Find the data with the given ID and delete it
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

    /**
     * Searches for data by ID in a JSON file.
     *
     * @param int $id The ID of the data to be searched.
     * @param string $fileName The name of the JSON file.
     * @return mixed The data with the given ID or an error message.
     */
    public function searchInDataBase($id, $fileName)
    {
        // Check if the file exists
        if (file_exists($fileName)) {
            // Read the existing data from the file
            $existingData = file_get_contents($fileName);
            $existingDataArray = json_decode($existingData, true);

            // Find the data with the given ID and return it
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
