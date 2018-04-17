<% if CarouselElements.Exists %>
<div class="carousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <% loop $CarouselElements %>
            <li data-target=".carousel" data-slide-to="$Pos(0)" class="indicator-pos"></li>
        <% end_loop %>
    </ol>

    <div class="carousel-inner" role="listbox">
        <% loop $CarouselElements %>
        <div class="carousel-item">
            $Image
            <span class="img-overlay"></span>
            <div class="carousel-caption">
                <% if $Caption %>
                    <h2>
                        $Caption
                    </h2>
                <% end_if %>
                <% if $ButtonText %>
                <a href="$LinkedPage.Link" class="btn btn-primary btn-lg">$ButtonText.RAW</a>
                <% end_if %>
            </div>
        </div>
        <% end_loop %>
    </div>
<!--
    <a class="carousel-control-prev" href=".carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href=".carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
   </a> -->
</div>
<% end_if %>

<script type="text/javascript">
	$(document).ready(function() {
		$('.carousel').find('.carousel-item').first().addClass('active');
		$('.carousel').find('.indicator-pos').first().addClass('active');
      $('.carousel').carousel();
	});
</script>
