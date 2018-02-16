<?php


    $query = " 
        SELECT
            id, 
			name
        FROM sitename
    "; 
     
    try 
    { 
        // These two statements run the query against your database table. 
        $stmt = $db->prepare($query); 
        $stmt->execute(); 
    } 
    catch(PDOException $ex) 
    { 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code.  
        die("Failed to run query: " . $ex->getMessage()); 
    } 
         
    // Finally, we can retrieve all of the found rows into an array using fetchAll 
    $rows = $stmt->fetchAll(); 


?>
<?php foreach($rows as $row): ?>
        
	<?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8'); ?>
                        
<?php endforeach; ?>