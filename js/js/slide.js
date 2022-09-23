	$('.slides > ul > li:gt(0)').hide();

setInterval(function (){
	$(".slides > ul > li:first")
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('.slides > ul');
}, 3000);

