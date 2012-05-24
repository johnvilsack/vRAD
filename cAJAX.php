<script type="text/javascript">
	$(function()
	{
		var upc = $("input#upc").val();
		var dataString = "upc=" + upc;
		var urlpost	= "items/1234" + upc;

		$.ajax(
		{
			type: "POST",
			url: urlpost,
			data: dataString,
			success: function()
			{
				$("#scanform").html("<div id='message'></div>");

				$("#message").html("<h2>Accomplished!</h2>")
					.hide()
					.fadeIn(1500, function()
					{
						$("#message").append(dataString);
					});
			}
		});
		return false;
	});
</script>
