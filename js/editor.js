var isCtrl = false;
var editor;
$(document).ready(function() {

    editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
	var MarkdownMode = require("ace/mode/markdown").Mode;
	editor.getSession().setMode(new MarkdownMode());
	editor.getSession().setUseWrapMode(true);
	editor.getSession().on("change", function(e) {
		$('#save').html("Unsaved");
	});

	$('#save').click(function() {
		console.log("Saving");
		saveContents();
	});

	editor.commands.addCommand({
	    name: 'save',
	    bindKey: {
	        win: 'Ctrl-S',
	        mac: 'Command-S'
	    },
	    exec: function(editor) {
		    saveContents();
	    }
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
function deleteDocument(path) {
	if(confirm("Are you sure you want to permanantly delete this document?")) {
		window.location=path;
	}
}