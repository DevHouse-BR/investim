// JavaScript Document
window.addEvent('domready', function() {
var myToggler = $$('div.arrow_drop');
	//create our Accordion instance
	var myAccordion = new Accordion($('accordion'), 'div.toggler', 'div.element', {			  
		display: 100,
    alwaysHide: true,	
	onActive: function(myToggler){
						myToggler.removeClass('arrowImageRight').addClass('arrowImageDown');
					},
				onBackground: function(myToggler){
						myToggler.removeClass('arrowImageDown').addClass('arrowImageRight');
					}
	});	
});



