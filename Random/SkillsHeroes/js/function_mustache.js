function mustache(data, template, outerTemplate)
{
	// debugArray(data);
	
	if ($(outerTemplate).data('template')) 
		{
			var template = $(outerTemplate).data('template');
		}
	else
		{
			var template = $(template).html();
			$(outerTemplate).data('template', template);
		}

	var renderTemplate = Mustache.render(template, data);

	$(outerTemplate).html(renderTemplate);
}