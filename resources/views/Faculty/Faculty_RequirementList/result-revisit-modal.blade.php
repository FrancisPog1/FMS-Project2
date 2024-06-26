{% load crispy_forms_tags %}

<!-- Modal -->
<div class="modal modal-blur fade" id="result-revisit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      	<div class="modal-content">
        	<div class="modal-header">
          		<h1 class="modal-title">Set the Survey Revisit Date</h1>
          		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#result-modal"></button>
        	</div>
	
        	<div class="modal-body">

				<form method="POST" autocomplete="off" 
					id="result-revisit-form"
					data-id="{{ accred_program.id }}">
					{% csrf_token %}


					<div class="row">
						<div class="col-lg-7">
							<div class="mb-3">
								<label class="form-label">Result Remarks <small class="text-muted">(Optional)</small></label>
								<textarea name="remarks" cols="40" rows="12" class="form-control" maxlength="5000" id="id_revisit_remarks"></textarea>
							</div>
						</div>

						<div class="col-lg-5">
							<label class="form-label">Upload File Here <small class="text-muted">(Optional)</small></label>
						
								<div class = "" >
									<div class="row">
										<input type="file" name="revisit_certificate_path" id="revisit-certification-path" multiple>
									</div>

									<div class="divide-y scrollable" style="height: 10rem">

										{% for file in records %}
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
					
					<br>

					<div class="mb-3 row">
						<div class="col">
							<label class="form-label required">Revisit Date</label>
							{{ revisit_result_form.revisit_date }}
						</div>

						<div class="col">
							<label class="form-label required">Revisit Compliance Deadline</label>
							{{ revisit_result_form.revisit_compliance_deadline }}
						</div>
					</div>

			</div>

					<div class="modal-footer">
						<button type="button" class="btn me-auto" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#result-modal">Close</button>
						<button id="submit-revisit" type="submit" class="btn btn-primary revisit-button">Save</button>
					</div>

				</form>
    	</div>
  	</div>
</div>
  