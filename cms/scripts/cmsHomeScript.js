(function() {
	$(document).ready(function(){
		//start the page out with the add note box hidden
		$("#noteForm").hide();
		//when the user clicks "add note" the note box will display
		$("#addNote").on('click', function(event){
			$("#noteForm").toggle();
			event.preventDefault();
		});
		//when the user clicks cancel, the notebox will clear and be hidden again
		$("#cancelNote").on('click', function(event){
			$("#noteBox").val('');
			$("#noteForm").hide();
			$("#noteUpdate").hide();
			event.preventDefault();
		});
		//when the user is in edit note mode and clicks cancel, the page will reload
		$("#cancelEdit").on('click', function(event){
			window.location.assign("/bubbaLyrics/cms/index.php");
			event.preventDefault();
		});
		//when the add note form is submitted, an ajax call happens that adds the note to the database and then dynamically prepends the data
		$('#noteForm').on('submit', function(event){
			var noteForm = $(this).serialize();
			var noteContent = document.forms["noteForm"]["noteBox"].value;	
			//ajax call to add note to database
			$.ajax({
				url: "/bubbaLyrics/cms/index.php?action=storeNote",
				method: "POST",
				data: noteForm
			})
			//done function that dynamically prepends the data
			.done(function(data){
				var obj = JSON.parse(data);
				$("#noteBox").val('');
				$("#noteForm").hide();
				$("#tableBody").prepend("<tr><td>" + noteContent + "</td><td>" + obj.name + "</td><td><a href='index.php?action=editNote&id=" + obj.lastInsert + "'><span class='glyphicon glyphicon-edit'></span> Edit </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?action=removeNote&id=" + obj.lastInsert + "'><span class='glyphicon glyphicon-remove'></span> Remove</a>" + "</td></tr>");
			});
			event.preventDefault();
		});
		//when a note is updated, invoke an ajax call that updates the note of a specific id, then reload the page
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