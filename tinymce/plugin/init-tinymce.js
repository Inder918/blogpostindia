tinymce.init({ 

  				selector:'textarea',

  				//theame =================>>
  				theme : "modern",
  				skin: "lightgray",

  				statubar: true,
  				plugins: [
  						"advlist autolink link image lists charmap print preview hr anchor pagebreak",
  						"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
  						"save table contextmenu directionality emoticons template paste textcolor",
  						"autoresize autosave help "
  				],

  				toolbar: "insertfile undo redo | stylesheet | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

  				style_formats: [
  					{ title: "Headers", items: [
  							{title: "Heading 1", format: "h1"},
  							{title: "Heading 2", format: "h2"},
  							{title: "Heading 3", format: "h3"},
  							{title: "Heading 4", format: "h4"},
  							{title: "Heading 5", format: "h5"},
  							{title: "Heading 6", format: "h6"},

  						]},
  					{ title: "Inline", items: [
  							{title: "Bold", icon: "bold", format: "bold"},
  							{title: "Italic", icon: "italic", format: "italic"},
  							{title: "Underline", icon: "underline", format: "underline"},
  							{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
  							{title: "Superscript", icon: "superscript", format: "superscript"},
  							{title: "Subscript", icon: "subscript", format: "subscript"},
  							{title: "code", icon: "code", format: "code"},

  						]},	
  					{title :"Blocks", items: [
  							{title: "Paragraph", format: "p"},
  							{title: "Blockquote", format: "blockquote"},
  							{title: "div", format: "div"},
  							{title: "Pre", format: "pre"},

						]},
					{ title: "Alignment", items: [
  							{title: "Left", icon: "alignleft", format: "alignleft"},
  							{title: "Center", icon: "aligncenter", format: "aligncenter"},
  							{title: "Right", icon: "alignright", format: "alignright"},
  							{title: "Justify", icon: "alignjustify", format: "alignjustify"},

  						]},		

  				],

				image_advtab: true,
				image_title: true,
				images_upload_url: "https://blogpostindia.com/middelware/admin/tinyUpload.php",
				images_upload_handler:function(blobInfo,success,failure){
					var xhr,formData;
					xhr= new XMLHttpRequest();
					xhr.withCredientials= false;
					xhr.open('POST','https://blogpostindia.com/middelware/admin/tinyUpload.php');

					xhr.onload= function(){
						var json;
						if (xhr.status != 200) {
							failure('Http Error: '+ xhr.status);
							return;
						}

						json= JSON.parse(xhr.responseText);

						if (!json || typeof json.location != 'string') {
							failure('Invalid json: ' + xhr.responseText);
							return;
						}

						success(json.location);
					};
					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());
					xhr.send(formData);
				},
				
				textcolor_map: [
				    "000000", "Black",
				    "993300", "Burnt orange",
				    "333300", "Dark olive",
				    "003300", "Dark green",
				    "003366", "Dark azure",
				    "000080", "Navy Blue",
				    "333399", "Indigo",
				    "333333", "Very dark gray",
				    "800000", "Maroon",
				    "FF6600", "Orange",
				    "808000", "Olive",
				    "008000", "Green",
				    "008080", "Teal",
				    "0000FF", "Blue",
				    "666699", "Grayish blue",
				    "808080", "Gray",
				    "FF0000", "Red",
				    "FF9900", "Amber",
				    "99CC00", "Yellow green",
				    "339966", "Sea green",
				    "33CCCC", "Turquoise",
				    "3366FF", "Royal blue",
				    "800080", "Purple",
				    "999999", "Medium gray",
				    "FF00FF", "Magenta",
				    "FFCC00", "Gold",
				    "FFFF00", "Yellow",
				    "00FF00", "Lime",
				    "00FFFF", "Aqua",
				    "00CCFF", "Sky blue",
				    "993366", "Red violet",
				    "FFFFFF", "White",
				    "FF99CC", "Pink",
				    "FFCC99", "Peach",
				    "FFFF99", "Light yellow",
				    "CCFFCC", "Pale green",
				    "CCFFFF", "Pale cyan",
				    "99CCFF", "Light sky blue",
				    "CC99FF", "Plum"
				],
				

		});