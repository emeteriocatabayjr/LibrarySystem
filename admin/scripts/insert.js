$('#insertform').submit(function(){
	$('#button').click(function(){
		$.post(		
			$('#insertform').attr('action'),
			$('#insertform :input').serializeArray(),
		);
	});
});