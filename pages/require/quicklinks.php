<?php

    $query = " 
        SELECT
            id,
			name,
            buttontitle,
            buttonlink,
            icon,
            class
            
        FROM quicklinks
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
        
	
<div class="col-lg-3 col-md-6">
                    <div class="<?php echo htmlentities($row['class'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="<?php echo htmlentities($row['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <div><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo htmlentities($row['buttonlink'], ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo htmlentities($row['buttontitle'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>    
</div>        
<?php endforeach; ?>