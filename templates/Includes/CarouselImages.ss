<% if CarouselElements.Exists %>
<section id="homepage-carousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <% loop $CarouselElements %>
            <li data-target="#carousel" data-slide-to="$Pos(0)" class="indicator-pos"></li>
        <% end_loop %>
    </ol>

    <div class="carousel-inner" role="listbox">
        <% loop $CarouselElements %>
        <div class="item">
            $Image
            <span class="img-overlay"></span>
            <div class="carousel-caption">
                <% if $Caption %>
                    <p>
                        $Caption
                    </p>
                <% end_if %>
                <% if $LinkedPage && $ButtonText %>
                <a href="$LinkedPage.Link">$ButtonText.RAW</a>
                <% end_if %>
            </div>
        </div>
        <% end_loop %>
    </div>

    <!-- <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><%t CarouselPage.PREVIOUS 'Previous' %></span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><%t CarouselPage.NEXT 'Next' %></span>
      </a> -->
</section>
<% end_if %>

<script type="text/javascript">
	$(document).ready(function() {
		$('#homepage-carousel').find('.item').first().addClass('active');
		$('#homepage-carousel').find('.indicator-pos').first().addClass('active');
	});
</script>
