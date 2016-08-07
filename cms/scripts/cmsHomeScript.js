(function() {
	$(document).ready(function(){
		$("#noteForm").hide();
		$("#addNote").on('click', function(event){
			$("#noteForm").toggle();
			event.preventDefault();
		});
		
		$("#cancelNote").on('click', function(event){
			$("#noteBox").val('');
			$("#noteForm").hide();
			$("#noteUpdate").hide();
			event.preventDefault();
		});
		
		$("#cancelEdit").on('click', function(event){
			window.location.assign("/bubbaLyrics/cms/index.php");
			event.preventDefault();
		});
		
		$('#noteForm').on('submit', function(event){
			var noteForm = $(this).serialize();
			var noteContent = document.forms["noteForm"]["noteBox"].value;			
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=storeNote",
				method: "POST",
				data: noteForm
			})
			.done(function(data){
				var obj = JSON.parse(data);
				$("#noteBox").val('');
				$("#noteForm").hide();
				$("#tableBody").prepend("<tr><td>" + noteContent + "</td><td>" + obj.name + "</td><td><a href='index.php?action=editNote&id=" + obj.lastInsert + "'><span class='glyphicon glyphicon-edit'></span> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?action=removeNote&id=" + obj.lastInsert + "'><span class='glyphicon glyphicon-remove'></span> Remove</a>" + "</td></tr>");
			});
			event.preventDefault();
		});
		
		$('#noteUpdate').on('submit', function(event){
			var noteForm = $(this).serialize();
			var noteContent = document.forms["noteForm"]["noteBox"].value;
			var idContent = document.forms["noteForm"]["noteBox"].value;				
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=updateNote",
				method: "POST",
				data: noteForm
			})
			.done(function(data){
				window.location.assign("/bubbaLyrics/cms/index.php");
			});
			event.preventDefault();
		});
	});
}())