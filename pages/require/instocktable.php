<?php

    $query = "SELECT id, itemname, itemnumber,  itemstockcount, itemlocation, discription FROM stock WHERE itemstockcount>='1'"; 
     
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
                           Items In Stock - Total: <?php require("require/instockcount.php"); ?> 
                            

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
                                            <th>Location</th>
                                            <th>Sell/Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php $i = 0; foreach($rows as $row ): { if($i==5) break; $i++; } ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemname'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemnumber'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemstockcount'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['itemlocation'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><a href="#"><button id="" type="button" class="btn btn-success btn-circle"><i class="fa fa-check"></i></button></a>
                                          
                                            <a href="#"><button id="" type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i>  </button></a></td>
                                            
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