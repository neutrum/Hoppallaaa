<script type="text/javascript">
{literal}
    $(document).ready(function() {
        $('#gallery a').lightBox({
                imageLoading: '/assets/gfx/lightbox/lightbox_loading.gif',
	            imageBtnClose: '/assets/gfx/lightbox/lightbox_close.gif',
	            imageBtnPrev: '/assets/gfx/lightbox/lightbox_prev.gif',
	            imageBtnNext: '/assets/gfx/lightbox/lightbox_next.gif'
        });
    });
{/literal}
</script>
<div class="ingallery-date">
    <span class="point">p</span><span class="date">{$gallery_data.GalPosted}</span>
</div>
<div class="ingallery-title">
    {$gallery_data.GalTitle}
</div>
<div id="gallery">
	{foreach from=$gallery_data.photos item=photo}
		<a href="/media/gallery/{$gallery_data.GalDir}/{$photo.PhoFile}">
		    <img src="/media/gallery/{$gallery_data.GalDir}/sc_{$photo.PhoFile}">
	    </a>
	{/foreach}
</div>