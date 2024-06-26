{% load crispy_forms_tags %}

<!-- Modal -->
<div class="modal modal-blur fade" id="result-passed-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		  <div class="modal-content">
			<div class="modal-header">
				  <h1 class="modal-title">Please Upload the Accreditation Result</h1>
				  <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#result-modal" aria-label="Close"></button>
			</div>

			<div class="modal-body scrollable">
				<form method="POST" autocomplete="off" 
					id="result-passed-form"
					data-id='{{ accred_program.id }}'>
					{% csrf_token %}

					<div class="row">
						<div class="col-lg-7">
							<div class="mb-3">
								<label class="form-label">{{ remarks_result_form.remarks.label }} <small class="text-muted">(Optional)</small></label>
								<textarea name="remarks" cols="40" rows="12" class="form-control" maxlength="5000" id="id_passed_remarks"></textarea>
							</div>
						</div>

						<div class="col-lg-5">
							<label class="form-label">Upload Certificate Here <small class="text-muted">(Optional)</small></label>
						
								<div class = "" >
									<div class="row">
										<input type="file" name="certificate_path" id="passed-certificate-path" multiple>
									</div>

									<div class="divide-y scrollable" style="height: 10rem">

										{% for file in certificates_records %}
											{% if file.accredited_program_id == accred_program.id %}
												<div class="row">
													<div class="col">
														<a href="#" class="text-muted" style="font-size: 10px">{{ file.certificate_name }}</a>
													</div>
												</div>
											{% endif %}
										{% endfor %} 
									</div>
	
								</div>
				   
					
						</div>
					</div>
			

					<div class="mb-3 row">
						<h2>Validity Dates</h2>
						<div class="col">
							<label class="form-label required">From</label>
							<input type="datetime-local" name="validity_date_from" class="form-control" required="" id="id_validity_date_from">
						</div>

						<div class="col">
							<label class="form-label required">To</label>
							<input type="datetime-local" name="validity_date_to" class="form-control" required="" id="id_validity_date_to">
						</div>
					</div>
					

				</div>

					<div class="modal-footer">
						<button type="button" class="btn me-auto" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#result-modal">Close</button>
						<button id="submit-passed-button" type="submit" class="btn btn-primary">Save</button>
					</div>

				</form>
		</div>
	  </div>
</div>
