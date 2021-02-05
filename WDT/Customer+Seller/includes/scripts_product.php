<!-- Jquery V.3.3.1 -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.cycle.js"></script>
<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
<script src="js/smoothproducts.min.js"></script>
<script>
	$("#sliderShuffle").cycle({
		next: '#next',
		prev: '#prev'
	});
	
	$('.owl-carousel').owlCarousel({
		items:4,
		loop:true,
		margin:15,
		autoplay:true,
		autoplayTimeout:3000, //3 Second
		nav:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:true
			},
			1000:{
				items:4,
				nav:true
			}
		}

	});

	$(function(){
		

		$(".sp-wrap").smoothproducts();
	});
</script>