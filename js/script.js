$(document).ready(function() {
	console.log("Loading");
	$('#save').click(function() {
		console.log("Saving");
		saveContents();
	});
});
function saveContents() {
	var page_name = document.getElementById('page_name').value;
	var content = editor.getSession().getValue();

	if(page_name==undefined) {
		alert("You must specify a name!");
	} else {
		$('#save').html("Saving...");

		var form = new FormData();
		form.append('content',content);

		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function(){
			if (ajax.readyState === 4) {
				if (ajax.status === 200) {
					$('#save').html("Save");
				}
			}
		};
		ajax.open("POST", "/wiki/save.php?p="+page_name);
		ajax.send(form);
	}
}