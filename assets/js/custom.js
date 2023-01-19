$(document).ready(function(){
    $('#alert-error-form').css('display', 'none');
    $('#alert-success-form').css('display', 'none');
    $('#alert-error').css('display', 'none');
    $('#alert-success').css('display', 'none');

    $("form#validate_address").submit(function(e) {
        e.preventDefault();
        $('#alert-error-form').css('display', 'none');
        $('#alert-success-form').css('display', 'none');
        $('#alert-error').css('display', 'none');
        $('#alert-success').css('display', 'none');
    }).validate({
        rules: {
            street: {
                required: true
            },
            street2: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            zipcode: {
                required: true,
                digits: true
            }
        },
        messages: {
            street: 'This field is required',
            street2: 'This field is required',
            city: 'This field is required',
            state: 'This field is required',
            zipcode: 'This field is required'
        },
        submitHandler: function(form) {
            let street = $("#street").val();
            let street2 = $("#street2").val();
            let city = $("#city").val();
            let state = $("#state").val();
            let zipcode = $("#zipcode").val();
            let dataString = 'street='+ street + '&street2='+ street2 + '&city='+ city + '&state='+ state + '&zipcode='+ zipcode;
            $.ajax({
                url: 'http://mailing-app.encoreskydev.com/validate-address.php',
                data: dataString,
                processData: false,
                type: 'POST',
                success: function ( response ) {
                    let jsonResponse = $.parseJSON( response );
                    if(jsonResponse.success) {
                        // console.log("SUCCESS", jsonResponse, jsonResponse.data);

                        let originalAddress = "<p><strong>Address Line 1:</strong> " + street + "</p>";
                        originalAddress += "<p><strong>Address Line 2:</strong> " + street2 + "</p>";
                        originalAddress += "<p><strong>City:</strong> " + city + "</p>";
                        originalAddress += "<p><strong>State:</strong> " + state + "</p>";
                        originalAddress += "<p><strong>Zip Code:</strong> " + zipcode + "</p>";
                        $('#pills-original-content').html(originalAddress);

                        $('#original_street').val(street);
                        $('#original_street2').val(street2);
                        $('#original_city').val(city);
                        $('#original_state').val(state);
                        $('#original_zipcode').val(zipcode);

                        if( jsonResponse.data && jsonResponse.data.length > 0 && jsonResponse.data[0].components ) {
                            let standardizeAddress = "<p><strong>Address Line 1:</strong> " + jsonResponse.data[0].components.street_name + "</p>";
                            standardizeAddress += "<p><strong>Address Line 2:</strong> " + jsonResponse.data[0].components.secondary_number + "</p>";
                            standardizeAddress += "<p><strong>City:</strong> " + jsonResponse.data[0].components.city_name + "</p>";
                            standardizeAddress += "<p><strong>State:</strong> " + jsonResponse.data[0].components.state_abbreviation + "</p>";
                            standardizeAddress += "<p><strong>Zip Code:</strong> " + jsonResponse.data[0].components.zipcode + "</p>";
                            $('#pills-standardize-content').html(standardizeAddress);

                            $('#standardize_street').val(jsonResponse.data[0].components.street_name);
                            $('#standardize_street2').val(jsonResponse.data[0].components.secondary_number);
                            $('#standardize_city').val(jsonResponse.data[0].components.city_name);
                            $('#standardize_state').val(jsonResponse.data[0].components.state_abbreviation);
                            $('#standardize_zipcode').val(jsonResponse.data[0].components.zipcode);
                        }

                        $('#alert-error').css('display', 'none');
                        $('#alert-success').css('display', 'none');
                        $('#addressModal').modal('show');
                    } else {
                        $('#alert-succes-form').css('display', 'none');
                        $('#alert-error-form').css('display', 'block').text("Something went wrong. Please try again later");
                    }
                },
                error: function( error ) {
                    $('#alert-succes-form').css('display', 'none');
                    $('#alert-error-form').css('display', 'block').text("Something went wrong. Please try again later");
                }
            });
        }
    });

    $("form#save_address").submit(function(e) {
        e.preventDefault();
        $('#alert-error-form').css('display', 'none');
        $('#alert-success-form').css('display', 'none');
        $('#alert-error').css('display', 'none');
        $('#alert-success').css('display', 'none');
        let address_type = $("#address_type").val();
        let dataString = "";
        if(address_type && address_type == 'original') {
            let street = $("#original_street").val();
            let street2 = $("#original_street2").val();
            let city = $("#original_city").val();
            let state = $("#original_state").val();
            let zipcode = $("#original_zipcode").val();
            dataString = 'street='+ street + '&street2='+ street2 + '&city='+ city + '&state='+ state + '&zipcode='+ zipcode + "&address_type=" + address_type;
        } else {
            let street = $("#standardize_street").val();
            let street2 = $("#standardize_street2").val();
            let city = $("#standardize_city").val();
            let state = $("#standardize_state").val();
            let zipcode = $("#standardize_zipcode").val();
            dataString = 'street='+ street + '&street2='+ street2 + '&city='+ city + '&state='+ state + '&zipcode='+ zipcode + "&address_type=" + address_type;
        }
        $.ajax({
            url: 'http://mailing-app.encoreskydev.com/save-address.php',
            data: dataString,
            processData: false,
            type: 'POST',
            success: function ( response ) {
                let jsonResponse = $.parseJSON( response );
                if(jsonResponse.success) {
                    $('#alert-error').css('display', 'none');
                    $('#alert-success').css('display', 'block').text("Address saved successfully!");
                } else {
                    $('#alert-success').css('display', 'none');
                    $('#alert-error').css('display', 'block').text("Address not saved. Please try again later");
                }
            },
            error: function( error ) {
                $('#alert-success').css('display', 'none');
                $('#alert-error').css('display', 'block').text("Address not saved. Please try again later");
            }
        });
    });

    const triggerTabList = document.querySelectorAll('#pills-tab button');
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);
        triggerEl.addEventListener('click', event => {
            event.preventDefault();
            $('#alert-error-form').css('display', 'none');
            $('#alert-success-form').css('display', 'none');
            $('#alert-error').css('display', 'none');
            $('#alert-success').css('display', 'none');
            var target = $(event.target).data("bs-target");
            if( target == '#pills-original' )
                $('#address_type').val("original");
            else
                $('#address_type').val("standardize");
            tabTrigger.show();
        });
    });
});