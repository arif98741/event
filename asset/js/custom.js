$(document).ready(function() {
	//assign value to the dropdown
	var type = 1;
	$('#registration_type').change(function() {
		var value = $(this).val();
		if (value === 'Former Student' || value === 'Running Student') {
			type = 300;
		}else{
			type = 700;
		}
	});


	//value will be changed according to changing no of members in family
	$('#no_of_member_in_family').keyup(function() {
		var total = type;
		member = $(this).val();
		if (member > 0) {
			total += type*member;
		}
		$('#amount').val(total);
		

	});
});