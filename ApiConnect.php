<?php
    // SQL Server Extension Code:
    $connectionInfo = array("UID" => "RicardovanToorn", "pwd" => "stekkerdoosnl14@", "Database" => "Thema10", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:ricardovantoorn.database.windows.net,1433";

    try {
        $conn = sqlsrv_connect($serverName, $connectionInfo);
    
        // SQL query
        $query = "SELECT * FROM Oefening21";
    
        // Prepare the statement
        $result = sqlsrv_query($conn, $query);
    
        // Convert result to a Array
        $apiResult = [];
    
        // Loop through every row
        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            // Add the row to the existing Array
            array_push($apiResult, $row);
        }
    }
    catch(Exception $e)
    {
        // Er is een fout opgetreden, waarschijnlijk door de database
        $apiResult["error"] = "Er is een onbekende fout opgetreden. Probeer opnieuw";
        $apiResult["message"] = $e->message();
    }
    
    
    // Show the apiResult as a JSON string to the user
    echo json_encode($apiResult);
?>