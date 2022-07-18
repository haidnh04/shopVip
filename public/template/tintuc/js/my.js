$(".MenuUsers").next('ul').toggle();

$(".MenuUsers").click(function(event) {
	$(this).next("ul").toggle(500);
});