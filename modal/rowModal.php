
	<!-- Edit Modal HTML -->
	<div id="rowModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">						
						<h4 class="modal-title">Add Project</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="rowNameTextBox" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label>Creation Date</label>
							<input type="date" id="creationDateTextBox" class="form-control" name="creationDate">
						</div>
						<div class="form-group">
              <label>End Date</label>
							<input type="date" id="endDateTextBox" class="form-control" name="endDate">
						</div>					
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="descriptionTextBox" name="description"></textarea>
            </div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" id="saveRowButton" class="btn btn-success" value="Add">
					</div>
			</div>
		</div>
	</div>
	