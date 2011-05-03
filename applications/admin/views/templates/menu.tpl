<script type="text/javascript" src="/assets/js/ui.admin.js"></script>   
<script>
	{literal}
	$(document).ready(function() 
	{
		$('.delete_category').click(function (){
			 var answer = confirm('Vazne chcete polozku zmazat?');
  			 return answer // answer is a boolean
		});
	});
	{/literal}
</script>
<div class="add-new">
<a href="menu/insert"><img src="/assets/gfx/new.png"/> <span class="add-new-link">pridaj kategoriu</span></a>
</div>

<BR>
<table class="news_table" width="600">
<tr> 
	<td class="table_header">
		Nazov
	</td>
	<td class="table_header">
		Pocet poloziek
	</td>
	<td  class="table_header">
		Tools
	</td>
</tr>
{foreach from=$categories item=category}
	{include file='menu/menublock.tpl'}
{/foreach}
</table>