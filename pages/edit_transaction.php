<!-- Edit -->
<div class="modal fade" id="edit_tra<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
         <form method="POST" action="connections_pro/edit_transaction.php">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Status</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
		
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Change to:</label>
					</div>
					<div class="col-sm-10">
                           
                            <select class="form-control" name="status">
                                <option value="Pending">Pending</option>
                                <option value="Washed">Washed</option>
                                <option value="Delivered">Delivered</option>
                            </select>
					</div>
				</div>
				
            </div> 
			</div>
			    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			    <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</div>
			</form>
        </div>
</div>