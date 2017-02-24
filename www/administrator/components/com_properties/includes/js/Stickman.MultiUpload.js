var MultiUpload = new Class(
{	
	initialize:function( input_element, max, name_suffix_template, show_filename_only, remove_empty_element ){

		// Sanity check -- make sure it's  file input element
		if( !( input_element.tagName == 'INPUT' && input_element.type == 'file' ) ){
			alert( 'Error: not a file input element' );
			return;
		}

		// List of elements
		this.elements = [];
		// Lookup for row ID => array ID
		this.uid_lookup = {};
		// Current row ID
		this.uid = 0;

		// Maximum number of selected files (default = 0, ie. no limit)
		// This is optional
		if( $defined( max ) ){
			this.max = max;
		} else {
			this.max = 0;
		}

		// Template for adding id to file name
		// This is optional
		if( $defined( name_suffix_template ) ){
			this.name_suffix_template = name_suffix_template;
		} else {
			this.name_suffix_template= '_{id}';
		}

		// Show only filename (i.e. remove path)
		// This is optional
		if( $defined( show_filename_only ) ){
			this.show_filename_only = show_filename_only;
		} else {
			this.show_filename_only = false;
		}
		
		// Remove empty element before submitting form
		// This is optional
		if( $defined( remove_empty_element ) ){
			this.remove_empty_element = remove_empty_element;
		} else {
			this.remove_empty_element = false;
		}

		// Add element methods
		$( input_element );

		// Base name for input elements
		this.name = input_element.name;
		// Set up element for multi-upload functionality
		this.initializeElement( input_element );

		// Files list
		var container = new Element(
			'div',
			{
				'class':'multiupload'
			}
		);
		this.list = new Element(
			'div',
			{
				'class':'list'
			}
		);
		container.injectAfter( input_element );
		container.adopt( input_element );
		container.adopt( this.list );
		
		// Causes the 'extra' (empty) element not to be submitted
		if( this.remove_empty_element){
			input_element.form.addEvent(
				'submit',function(){
					this.elements.getLast().element.disabled = true;
				}.bind( this )
			);
		}
	},

	
	/**
	 * Called when a file is selected
	 */
	addRow:function(){
		if( this.max == 0 || this.elements.length <= this.max ){
		
			current_element = this.elements.getLast();

			// Create new row in files list
			var name = current_element.element.value;
			var ruta = name;
			/*confirm(ruta);*/
			// Extract file name?
			if( this.show_filename_only ){
				if( name.contains( '\\' ) ){
					name = name.substring( name.lastIndexOf( '\\' ) + 1 );
				}
				if( name.contains( '//' ) ){
					name = name.substring( name.lastIndexOf( '//' ) + 1 );
				}
			}
			var item = new Element(
				'span'
			).setText( name );
			/*var item = new Element(
				'div',
				{
					'class':'Fabio',
					'events':{
						'click':function( uid ){
							irurl();
							//this.document.myForm.submit();
							confirm('fabio');
						}}
				}
			).setText( name );*/
			
			var delete_button = new Element(
				'img',
				{
					'src':'images/publish_x.png',
					'alt':'Delete',
					'title':'Delete',
					'events':{
						'click':function( uid ){
							this.deleteRow( uid );
						}.pass( current_element.uid, this )
					}
				}
			);
			var row_element = new Element(
				'div',
				{
					'class':'item'
				}
			).adopt( delete_button ).adopt( item );
			this.list.adopt( row_element );
			current_element.row = row_element;
			
			// Create new file input element
			var new_input = new Element
			(
				'input',
				{
					'type':'file',
					'disabled':( this.elements.length == this.max )?true:false
				}
			);
			
			
			var new_input_desc = new Element
			(
				'input',
				{
					'type':'text',
					'enable':( this.elements.length == this.max )?true:false
				}
			);
			
			
			
			// Apply multi-upload functionality to new element
			this.initializeElement(new_input);

			// Add new element to page
			current_element.element.style.position = 'absolute';
			current_element.element.style.left = '-1000px';
			new_input.injectAfter( current_element.element );
		} else {
			alert( 'You may not upload more than ' + this.max + ' files'  );
		}
		
	},

	/**
	 * Called when the delete button of a row is clicked
	 */
	deleteRow:function( uid ){
	
		// Confirm before delete
		deleted_row = this.elements[ this.uid_lookup[ uid ] ];
		if( confirm( 'Are you sure you want to remove the item\r\n' +  deleted_row.element.value + '\r\nfrom the upload queue?' ) ){
			this.elements.getLast().element.disabled = false;
			deleted_row.element.remove();
			deleted_row.row.remove();
			// Get rid of this row in the elements list
			delete(this.elements[  this.uid_lookup[ uid ] ]);
			
			// Rewrite IDs
			var new_elements=[];
			this.uid_lookup = {};
			for( var i = 0; i < this.elements.length; i++ ){
				if( $defined( this.elements[ i ] ) ){
					this.elements[ i ].element.name = this.name + this.name_suffix_template.replace( /\{id\}/, new_elements.length );
					this.uid_lookup[ this.elements[ i ].uid ] = new_elements.length;
					new_elements.push( this.elements[ i ] );
				}
			}
			this.elements = new_elements;
		}
	},

	/**
	 * Apply multi-upload functionality to an element
	 *
	 * @param		HTTPFileInputElement		element		The element
	 */
	initializeElement:function( element ){

		// What happens when a file is selected
		element.addEvent(
			'change',
			function(){
				this.addRow()
			}.bind( this )
		);
		// Set the name
		element.name = this.name + this.name_suffix_template.replace( /\{id\}/, this.elements.length );

		// Store it for later
		this.uid_lookup[ this.uid ] = this.elements.length;
		this.elements.push( { 'uid':this.uid, 'element':element } );
		this.uid++;
	
	}
}
);