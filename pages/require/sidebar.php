<?php

 
    $query = " 
        SELECT
            id, 
			title,
            domain,
			class,
			target
        FROM sidebar
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
        
							<li><a href="<?php echo htmlentities($row['domain'], ENT_QUOTES, 'UTF-8'); ?>" target="<?php echo htmlentities($row['target'], ENT_QUOTES, 'UTF-8'); ?>"><i class="<?php echo htmlentities($row['class'], ENT_QUOTES, 'UTF-8'); ?>"></i> <?php echo htmlentities($row['title'], ENT_QUOTES, 'UTF-8'); ?> </a>
							</li>
                        
<?php endforeach; ?>