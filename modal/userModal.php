<!-- Modal -->
<div class="modal fade" id="userModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $_SESSION['loggedIn']; ?></h4>
        </div>
        <div class="modal-body">
        <table id="user-table"class="styled-table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //getting table from sql server and user tabledit to edit it
                        $sql_query_user = "SELECT id, userName, email, firstName, lastName FROM Samuel.dbo.[user] WHERE userName='" . $_SESSION['loggedIn'] . "'";
                        $resultset = $connection->executeQuery($sql_query_user);
                        while( $user = $resultset->getNextRow()) {
                        ?>
                            <tr id="<?php echo $user ['id']; ?>">
                                <td><?php echo $user ['id']; ?></td>
                                <td><?php echo $user ['userName']; ?></td>
                                <td><?php echo $user ['email']; ?></td>
                                <td><?php echo $user ['firstName']; ?></td>
                                <td><?php echo $user ['lastName']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
        </div>
        <div class="modal-footer">
        <button type="button" id="deleteUserButton"class="btn btn-default ">Delete User</button>
        <button type="button" id="changePasswordButton" data-dismiss="modal" data-toggle="modal" href="#changePasswordModal" class="btn btn-default ">Change Password</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>