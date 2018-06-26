$(document).ready(function() {
	//assign value to the dropdown
	var type = 1;
	$('#registration_type').change(function() {
		var value = $(this).val();
		if (value === 'Current Student') {
			type = 300;
			$('#amount').val(300);
			$('#no_of_member_in_family').attr({
				disabled: ""
			});
			$('#no_of_member_in_family').val('');
			
		}else{
			type = 700;
			$('#no_of_member_in_family').val('');
			$('#no_of_member_in_family').removeAttr('disabled');
			
			$('#amount').val(700);
		}
	});


	//value will be changed according to changing no of members in family
	$('#no_of_member_in_family').change(function() {
		var total = type;
		member = $(this).val();
		if (member > 0) {
			total += 300 * member;
		}
		$('#amount').val(total);
		

	});
});