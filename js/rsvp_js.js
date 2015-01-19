$(document).ready(function() {
   
$('#attendingDetails').css('display','none');
$('#partnerDiet').css('display','none');
$('#partnerName').css('display','none');

/*var going = $('#attending').val() == 'Yes';

if (going = true){

	alert('i am selected');
}else{

	alert('do nothing');
}
*/

//Highlights the clicked row
         if($(this).hasClass("normal")){
            $(this).removeClass("normal").addClass("highlight");
        }
        else {
            $(this).removeClass("highlight").addClass("normal");                                    
        }     

 //Checks the checkbox
        var $target = $(event.target);
        if(!$target.is('input:checkbox')) {
            
            $(this).find('input:checkbox').each(function() {
                if(this.checked) { this.checked = false; }
                else { this.checked = true;}
            });
        }
    });//End tr click
});

function formatPhone(obj) {
    var numbers = obj.value.replace(/\D/g, ''),
        char = {0:'(',3:') ',6:' - '};
    obj.value = '';
    for (var i = 0; i < numbers.length; i++) {
        obj.value += (char[i]||'') + numbers[i]; 
    }
}


function validate()
{
var mobile = $('#mobile').val();
var email = $('#email').val();
var name = $('#name').val();
var ID = $('#ID').val();
var partnerName = $('#partner_Details').val();
var partnerAttending = $('#attending_Partner').val();
var attending = $('#attending').val();
var dietary = $('#dietary').val();
var dietary_Partner = $('#dietary_Partner').val();

 

    if( name == "" || name == null){
	  alert("Please enter your name");
	  return false;
	}
	if(ID == "" || ID == null){
	  alert("Please enter your ID");
	  return false;
	}
	
	if(attending == ""){
	  alert("Please let us know whether or not you are attending");
	  return false;
	}
	

	if(attending == 'Yes'){
		//Validation if person is attending
					if(partnerAttending == ""){
						alert("Please advise whether you will be attending with a partner");

					}
					if(partnerAttending == "Yes"){
						if(partnerName == "" || partnerName == null){
								alert("Please enter your partners details");
								}
						if(dietary_Partner == ""){
							  alert("Please supply us your parnters dietary requirements");
							  return false;
					}		
					}

			    	if(dietary == ""){
			 		 alert("Please supply us with your dietary requirements");
			 		 return false;
					}
					
					if(mobile == "" || mobile == null){
					  alert("Please enter a contact number");
					  return false;
					}
					if( email == "" || email == null){
					  alert("Please enter your email address");
					  return false;
					}

					var x = document.forms["testForm"]["email"].value;
				    var atpos = x.indexOf("@");
				    var dotpos = x.lastIndexOf(".");
				    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
				        alert("Not a valid e-mail address");
				        return false;
   	 					}
	}

}






//This function is for the attending hide show function.
function attendingEvent(){

	

	if($('#attending').val() == 'Yes') {

	     //Show rest of rsvp form if attending
	    	$('#attendingDetails').css('display','block');

	    	

	}
	else if($('#attending').val() == 'No'){
		 //Hide rest of rsvp form if not attending
			$('#attendingDetails').css('display','none');
	}else{
		//Alert box if no value entered on submit	
			alert('Please select an option');
	}

}

//This function controls the coming with or with a partner
function partner(){
	if($('#attending_Partner').val() == 'Yes') {

	     //allow user to input partner details if they are attending wiht a partner
	    	$('#partnerDiet').css('display','table-row');
			$('#partnerName').css('display','table-row');

	}
	else if($('#attending_Partner').val() == 'No'){

		 //Hide partner details if user is not attending with a partner
			$('#partnerDiet').css('display','none');
			$('#partnerName').css('display','none');
	}else{
		//Alert box if no value entered on submit	
			alert('Will you be attending with a partner ?');
	}

}