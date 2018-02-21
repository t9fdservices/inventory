<?php

require("config.php");


    $query = "SELECT id, name, username, email, notes, status, website FROM users"; 
     
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

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($rows as $row): ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlentities($row['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><button id="" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#updateuser"><i class="fa fa-check"></i></button></td>
                                            
                                            <td><button id="" type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteuser"><i class="fa fa-trash"></i>  </button></td>
                                            
                                        </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->