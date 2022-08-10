$(document).ready(function(){

	$("#get-data-form").submit(function(e){

		content = tinymce.get("texteditor").getContent();

		$("#data-container").html($content);
		// $content=content;
		// $.ajax({
		// 	url: 'getdata.php',
		// 	type: 'post',
		// 	data: {data: $content},
		// 	datatype: 'html',
		// 	success: function(rsp){

		// 			alert(rsp="The editor content has been inserted successfully.");
		// 		}
		// });

		return false;

	});

});