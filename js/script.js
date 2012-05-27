function saveContents() {
	var page_name = document.getElementById('page_name').value;
	var content = editor.getSession().getValue();

	var form = new FormData();
	form.append('content',content);

	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function(){
		if (ajax.readyState === 4) {
			if (ajax.status === 200) {
				alert(ajax.responseText);
			}
		}
	};
	ajax.open("POST", "/wiki/save.php?p="+page_name);
	ajax.send(form);

}