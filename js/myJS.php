<?php 

?>

<script>

	jQuery(document).ready(function($) {
		var $container= $('.Pcontainer');
		var $tagSet= $('.filter-cat');
		var $tags=$tagSet.find('a');
		$(window).load(function(){
			$('.Pcontainer .PAll').each(function(i){
			//alert("sad");
			$(this).delay(i*150).animate({'opacity':1},300);
			});
			var firstTag=$('.filter-cat a').first().text();
			$tags.first().addClass('selected');
			var options={};
			options['filter']='.P'+firstTag;
			$container.isotope(options);
		});


		$tags.click(function(){
			$tagSet.find('.selected').removeClass('selected');
			$(this).addClass('selected');
			var options={};
			var key='filter';
			var value=$(this).text();
			options[key]='.P'+value;
			//alert(options[key]);
			$container.isotope(options);
			

		});

	});

</script>