<% require css("carousel/css/bootstrap.min.css") %>
<% require javascript("carousel/js/jquery.min.js") %>
<% require javascript("carousel/js/bootstrap.min.js") %>

<% if CarouselElements.Exists %>
	<section class="image-carousel">
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<% loop $CarouselElements %>
					<div class="item">
						$SizedImage
						<% if $Caption %>
							<div class="carousel-caption">
								$Caption.RAW
							</div>
						<% end_if %>
					</div>
				<% end_loop %>
			</div>
			<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
		</div>
	</section>
<% end_if %>

<script type="text/javascript">
	$(document).ready(function() {
		$('#carousel').find('.item').first().addClass('active');
	});
</script>