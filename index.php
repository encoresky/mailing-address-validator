<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mailing Address</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	</head>
	<body>
		<div class="container">
		  	<div class="row">
		    	<div class="col-md-6 offset-md-3 mb-3">
		    		<div class="card">
					  	<div class="card-head text-center">
				  			<br/>
					  		<h3>Address Validator</h3>
					  		<p>Validate/Standardize addresses using USPS</p>
					  	</div>
					  	<div class="card-body">
					    	<form method="POST" name="validate_address" id="validate_address">
					    		<div class="row">
					    			<div class="col-md-12 mb-2">
					    				<label for="street"></label>
					    				<input type="text" name="street" id="street" placeholder="Address Line 1" class="form-control"  />
					    			</div>
					    		</div>
					    		<div class="row">
					    			<div class="col-md-12 mb-2">
					    				<label for="street2"></label>
					    				<input type="text" name="street2" id="street2" placeholder="Address Line 2" class="form-control"  />
					    			</div>
				    			</div>
					    		<div class="row">
					    			<div class="col-md-12 mb-2">
					    				<label for="city"></label>
					    				<input type="text" name="city" id="city" placeholder="City" class="form-control"  />
					    			</div>
				    			</div>
					    		<div class="row">
					    			<div class="col-md-12 mb-2">
					    				<label for="state"></label>
					    				<select name="state" id="state" class="form-control">
											<option value="">Select State</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
					    			</div>
				    			</div>
					    		<div class="row">
					    			<div class="col-md-12 mb-2">
					    				<label for="zipcode"></label>
					    				<input type="text" name="zipcode" id="zipcode" placeholder="Zip Code" class="form-control"  />
					    			</div>
				    			</div>
					    		<div class="row">
					    			<div class="col-md-12 mb-2 text-center">
					    				<div class="alert alert-success" role="alert" id="alert-success-form"></div>
										<div class="alert alert-danger" role="alert" id="alert-error-form"></div>
										<br/>
					    				<button class="btn btn-primary" type="submit">Validate</button>
					    			</div>
					    		</div>
					    	</form>
					  	</div>
					</div>
		    	</div>
		  	</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModelLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
		    		<form method="POST" name="save_address" id="save_address">
			      		<div class="modal-header">
			        		<h1 class="modal-title fs-5" id="addressModelLabel">Save Address</h1>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      		</div>
				      	<div class="modal-body">
				      		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				      			<li class="nav-item" role="presentation">
								    <button class="nav-link active" id="pills-original-tab" data-bs-toggle="pill" data-bs-target="#pills-original" type="button" role="tab" aria-controls="pills-original" aria-selected="true">
								    	Original
									</button>
								</li>
							 	<li class="nav-item" role="presentation">
								    <button class="nav-link" id="pills-standardize-tab" data-bs-toggle="pill" data-bs-target="#pills-standardize" type="button" role="tab" aria-controls="pills-standardize" aria-selected="false">
								    	Standardize (USPS)
							    	</button>
							  	</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-original" role="tabpanel" aria-labelledby="pills-original-tab" tabindex="0">
								  	<div class="row">
							  			<div class="col-md-12 mb-2">
							  				<div class="card">
											  	<div class="card-body" id="pills-original-content">

											  	</div>
										  	</div>
							  			</div>
							  		</div>
								  </div>
								  <div class="tab-pane fade" id="pills-standardize" role="tabpanel" aria-labelledby="pills-standardize-tab" tabindex="0">
								  	<div class="row">
							  			<div class="col-md-12 mb-2">
							  				<div class="card">
											  	<div class="card-body" id="pills-standardize-content">

											  	</div>
										  	</div>
							  			</div>
							  		</div>
							  	</div>
						  	</div>

						  	<div class="alert alert-success" role="alert" id="alert-success"></div>
							<div class="alert alert-danger" role="alert" id="alert-error"></div>
				      	</div>
				      	<div class="modal-footer">
				      		<input type="hidden" name="address_type" id="address_type" value="original" />

				      		<input type="hidden" name="original_street" id="original_street" value="" />
				      		<input type="hidden" name="original_street2" id="original_street2" value="" />
				      		<input type="hidden" name="original_city" id="original_city" value="" />
				      		<input type="hidden" name="original_state" id="original_state" value="" />
				      		<input type="hidden" name="original_zipcode" id="original_zipcode" value="" />

				      		<input type="hidden" name="standardize_street" id="standardize_street" value="" />
				      		<input type="hidden" name="standardize_street2" id="standardize_street2" value="" />
				      		<input type="hidden" name="standardize_city" id="standardize_city" value="" />
				      		<input type="hidden" name="standardize_state" id="standardize_state" value="" />
				      		<input type="hidden" name="standardize_zipcode" id="standardize_zipcode" value="" />

				        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				        	<button type="submit" class="btn btn-primary">Save</button>
				      	</div>
			    	</form>
		    	</div>
		  	</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
		<script type="text/javascript" src="assets/js/custom.js"></script>
	</body>
</html>