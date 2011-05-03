<script>
{literal}
	
{/literal}
</script>
<div class="section-title">
    <img src="/assets/gfx/Galerie.png" alt="">
</div>
<div class="clear"></div>
{foreach from=$galleries item=gallery}
	<div class="gallery-block">
		   <div class="gallery-frontphoto">
		   		<a href="/gallery/show/{$gallery.GalID}"><img src="/media/gallery/{$gallery.GalDir}/fesc_{$gallery.PhoFile}"></a>
		   </div>
		   
		   <div class="gallery-data">
		   		<div class="gallery-title"><a href="/gallery/show/{$gallery.GalID}">{$gallery.GalTitle}</a></div>
		   		<div class="gallery-date">{$gallery.GalPosted}</div>
		   </div>
		   <div class="gallery-data-bottom">
		        <div class="gallery-views">Viewed: {$gallery.GalViews}</div>
		   </div>
	</div>
	<div class="clear"></div>
{/foreach}