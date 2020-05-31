
AOS.init();

$( document ).ready(function() {

	$('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{ items:1 },
        500:{ items:2 },
        1000:{ items:4 }
    	}
	});

	// create assignment
    $("select#test-cases").change(function(){

    	let i;
		var prev = $("#test-case-container > div").length;

    	var cases = parseInt($('#test-cases').find(":selected").val());
    	var cards = "";

    	if (prev > cases) {
    		for (i = cases+1; i <= prev; i++) {
    			$('#case'+i).remove();
    			console.log('#case'+i);
    		}
    	} else {

	    	for (let i = prev+1; i <= cases; i++) {
	    		if ( i%2 === 1 ) {
	    			cards += '<div class="row test-case-input-left" id="case'+i+'"><div class="col-md-6"><label>Input '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="input'+i+'" id="input'+i+'" size="8000"><label class="custom-file-label" for="input'+i+'">Input '+i+':</label></div></div><div class="col-md-6"><label>Output '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="output'+i+'" id="output'+i+'" size="8000"><label class="custom-file-label" for="output'+i+'">Output '+i+':</label></div></div></div>';
	    		} else {
	    			cards += '<div class="row test-case-input-right" id="case'+i+'"><div class="col-md-6"><label>Input '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="input'+i+'" id="input'+i+'" size="8000"><label class="custom-file-label" for="input'+i+'">Input '+i+':</label></div></div><div class="col-md-6"><label>Output '+i+':</label><div class="custom-file mb-4"><input type="file" class="custom-file-input" name="output'+i+'" id="output'+i+'" size="8000"><label class="custom-file-label" for="output'+i+'">Output '+i+':</label></div></div></div>';
	    		}
	    	}
	    }
    	$('#test-case-container').append(cards);
	});

	$(document).on("click", "#btn-toggle-password", function(e) {
		e.preventDefault();
		console.log("Clicked");	
	});
});
