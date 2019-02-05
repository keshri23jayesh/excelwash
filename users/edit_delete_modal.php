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
				<h2 class="text-center">
				    
				<?php  echo "<b>Product Name - </b>".$row['Product_Name']."<br><b>Service_cost - </b>".$row['Service_cost']."<br><b>No of Products - </b>".$row['No_of_products']."<br><b>No of Products - </b>".$row['Total_Cost']; ?>
				    
				</h2>
			</div>
            <div class="modal-footer">
                
                <form method="POST" action="connections/delete.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			        <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                    <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Yes</a>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                
            </div>

        </div>
    </div>
</div>