<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EditArea - the code editor in a textarea</title>
	<script language="Javascript" type="text/javascript" src="<?=base_url();?>ui/static/thirdparty/edit/edit_area_full.js"></script>
	<script language="Javascript" type="text/javascript">
		// initialisation

		
		editAreaLoader.init({
			id: "example_2"	// id of the textarea to transform	
			,start_highlight: true
			,allow_toggle: false
			,language: "en"
			,syntax: "html"	
			,toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
			,syntax_selection_allow: "css,html,js,php,python,vb,xml,c,cpp,sql,basic,pas,brainfuck"
			,is_multi_files: true
			,EA_load_callback: "editAreaLoaded"
			,show_line_colors: true
		});
		
		function editAreaLoaded(id){
			if(id=="example_2")
			{
				open_file1();
				open_file2();
			}
		}
		
		function open_file1()
		{
			var new_file= {id: "to\\ é # € to", text: "$authors= array();\n$news= array();", syntax: 'php', title: 'beautiful title'};
			editAreaLoader.openFile('example_2', new_file);
		}
		
		function open_file2()
		{
			var new_file= {id: "Filename", text: "<a href=\"toto\">\n\tbouh\n</a>\n<!-- it's a comment -->", syntax: 'html'};
			editAreaLoader.openFile('example_2', new_file);
		}
		
		function close_file1()
		{
			editAreaLoader.closeFile('example_2', "to\\ é # € to");
		}
		
	</script>
</head>
<body>
<h2>EditArea examples</h2>
	<fieldset>
		<legend>Example 2</legend>
		<p>Multi file mode example with syntax selection option. The highlight colors of the selected line is also shown.</p>
		<textarea id="example_2" style="height: 250px; width: 100%;" name="test_2">
		</textarea>
		<p>Custom controls:<br />
			<input type='button' onclick='open_file1()' value='open file 1' />
			<input type='button' onclick='open_file2()' value='open file 2' />
			<input type='button' onclick='close_file1()' value='close file 1' />
		</p>
	</fieldset>
</body>
</html>
