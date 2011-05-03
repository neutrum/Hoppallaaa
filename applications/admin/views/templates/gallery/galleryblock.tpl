
<tr>
	<td class="front-photo">
		{if $gallery.PhoFile}
			<a target="_blank" href="/media/gallery/{$gallery.GalDir}/{$gallery.PhoFile}"><img src="/media/gallery/{$gallery.GalDir}/sc_{$gallery.PhoFile}"></a>
		{else}
			no<BR>picture
		{/if}
	</td>
	<td class="news_title">              
		    <a href="gallery/edit/{$gallery.GalID}">{$gallery.GalTitle}</a>
	</td>
	<td class="news_tools">
			<a href="gallery/upload/{$gallery.GalID}"><img src="/assets/gfx/upload.png"/></a> 
		<a href="gallery/edit/{$gallery.GalID}"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_gallery" href="gallery/delete/{$gallery.GalID}"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>