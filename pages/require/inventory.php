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


                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            In Stock Inventory <small><button class="btn btn-success btn-xs" style="float: right;" data-toggle="modal" data-target="#addstock"> Add Stock </button></small>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="inventory">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item Name</th>
                                        <th>Item Number</th>
                                        <th>Stock Count</th>
                                        <th>Item Location</th>
                                        <th>Discription</th>
                                        <th>Add/Del</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <?php foreach($rows as $row): ?>
                                        <td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlentities($row['itemname'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlentities($row['itemnumber'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="center"><?php echo htmlentities($row['itemstockcount'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="center"><?php echo htmlentities($row['itemlocation'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="center"><?php echo htmlentities($row['discription'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><button id="" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#addstock"><i class="fa fa-check"></i></button>

                                        <button id="" type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deletestock"><i class="fa fa-trash"></i>  </button></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>

                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>    


<!-- Modals -->
<div class="modal fade" id="addstock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php require("require/addstock.php"); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deletestock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>