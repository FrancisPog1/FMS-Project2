<!-- Modal -->
{% now "Y-m-d" as today %}
<div class="modal modal-blur fade" id="result-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      	<div class="modal-content">
        	<div class="modal-header">
				<h1 class="modal-title">Please set the Result of the Accreditation</h1>
          		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        	</div>
	
        	<div class="modal-body">

				<div class="form-floating">
					<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
					  <option selected>Open this select menu</option>
					  <option value="passed">Passed</option>
					  <option value="sfr">Subject for Revisit</option>
						{% if today > accred_program.revisit_date|date:"Y-m-d" and accred_program.is_done == False %}
							<option value="failed">Failed</option>
						{% endif %}
					</select>
					<label for="floatingSelect">Select a Result</label>
				  </div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
				<button type="button" id="nextBtn" class="btn ms-auto btn-primary next-btn" data-bs-dismiss="modal" data-id='{{record.id}}'>Next</button>
			</div>

    	</div>
  	</div>
</div>
  