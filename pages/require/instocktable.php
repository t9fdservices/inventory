<?php

    $query = " 
      SELECT
            id,
			itemname,
            itemnumber,
            itemstockcount
            
        FROM stock
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

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Instock
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Item Number</th>
                                            <th>Stock Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php foreach($rows as $row): ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemname'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemnumber'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemstockcount'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            
                                        </tr>
                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->