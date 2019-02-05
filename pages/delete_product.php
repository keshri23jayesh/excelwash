<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['Product_Name']." ".$row['Service_cost']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                
                <form method="POST" action="connections_pro/delete.php">
    			    <input type="hidden" class="form-control" name="table_name" value="<?php echo $f4[6]; ?>">
    				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
    				<input type="hidden" class="form-control" name="idy" value="<?php echo $_GET['id']; ?>">
			    <button type="submit" name="delete" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Yes</a>
			    </form>
                
            </div>

        </div>
    </div>
</div>