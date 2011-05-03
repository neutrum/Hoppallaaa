<script type="text/javascript" src="/assets/js/ui.admin.js"></script>
<script>
	{literal}
	$(document).ready(function() 
	{
		$('.delete_gallery').click(function (){
			 var answer = confirm('Vazne chcete polozku zmazat?');
  			 return answer // answer is a boolean
		});
	});
	{/literal}
</script>
<div class="add-new">
<a href="gallery/insert"><img src="/assets/gfx/new.png"/> <span class="add-new-link">pridaj galeriu</span></a>
</div>

<BR>
<table class="news_table" width="600">
<tr>
	<td clas="table_header">
		
	</td> 
	<td class="table_header">
		Nazov
	</td>
	<td  class="table_header">
		Tools
	</td>
</tr>
{foreach from=$galleries item=gallery}
	{include file='gallery/galleryblock.tpl'}
{/foreach}
</table>