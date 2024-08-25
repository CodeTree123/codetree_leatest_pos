$('#navbar').bootnavbar();
$('.user-profile-part').bootnavbar();

//add field
$(document).ready(function(){
    var maxFieldLimit = 10; //Input fields increment limitation
    var add_more_field = $('.addextra'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-12" style="clear: both;"><form><div class="form-row"><div class="form-group col-md-5"><input type="email" class="form-control" id="inputEmail4" placeholder="Email"></div><div class="form-group col-md-5"><input type="password" class="form-control" id="inputPassword4" placeholder="Password"></div><a href="#" class="col-md-2 remove_button"><button type="button" class="btn btn-dark ">remove</button></a></div></form></div>';

    var x = 1; //Initial field counter is 1
    $(add_more_field).click(function(){ //Once add button is clicked

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});


//gigform add extra button with remove btn
/*$(document).ready(function(){
    var maxFieldLimit = 10; //Input fields increment limitation
    var add_more_button = $('.add-extra-button'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="padding:0; margin:0;"><input type="text" value="" placeholder="Enter Your Extra Service" style="width:75%; margin: 5px 0;"/><input type="number" min="1" placeholder="$" value="" style="width:15%;margin-left: 3px;"><a href="#" class="remove_button" style="padding-left:3px;" title="Remove field"><span style="color: green; font-size:18px;"><i class="far fa-times-circle"></i></span></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(add_more_button).click(function(){ //Once add button is clicked

      $('html, body').animate({
              scrollTop: $('#extra-service').position().top
            }, 'slow');

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});*/