$("#duplicar3-Superior").change(event => {
	$.get(`Seccion/${event.target.value}`, function(res, sta){
		$("#town").empty();
		res.forEach(element => {
			$("#town").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});
