
	$('.services').slick({
					rows: 1,
					dots:false,
					infinite: true,
					speed: 300,
					slidesToShow: 6,
					arrows:true,
					slidesToScroll: 1,
					responsive: [
						{
							breakpoint: 1024,
							settings:{
								arrows:true,
								slidesToShow: 3,
								slidesToScroll: 1,
								infinite: false,
								dots: true
							}
						},
						{
							breakpoint: 770,
							settings:{
								arrows:false,
								slidesToShow: 1,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 480,
							settings:{
								arrows:false,
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});


				
	$('testimonial-small-image-slider').slick({
		rows: 1,
		dots:false,
		infinite: true,
		speed: 300,
		slidesToShow: 6,
		arrows:true,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings:{
					arrows:true,
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: false,
					dots: true
				}
			},
			{
				breakpoint: 770,
				settings:{
					arrows:false,
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings:{
					arrows:false,
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	$('testimonial-small-text-slider').slick({
		rows: 1,
		dots:false,
		infinite: true,
		speed: 300,
		slidesToShow: 6,
		arrows:true,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings:{
					arrows:true,
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: false,
					dots: true
				}
			},
			{
				breakpoint: 770,
				settings:{
					arrows:false,
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings:{
					arrows:false,
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	