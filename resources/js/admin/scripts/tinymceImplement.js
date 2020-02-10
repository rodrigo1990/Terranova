tinymce.init(
	{
	selector: ".tinyMCE",  // change this value according to your HTML
	plugins: "link",
	menubar: "insert edit align",
	language:'es',
	style_formats: [
    { title: 'Headers', items: [
      { title: 'Heading 2', block: 'h2' },
      { title: 'Heading 3', block: 'h3' },
      { title: 'Heading 4', block: 'h4' },
      { title: 'Heading 5', block: 'h5' },
      { title: 'Heading 6', block: 'h6' }
      ]
    }
  ]

	}



);