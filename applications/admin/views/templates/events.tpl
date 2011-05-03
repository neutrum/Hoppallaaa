<script type="text/javascript" src="/assets/js/ui.admin.js"></script>
<script>
	{literal}
	$(document).ready(function() 
	{
		$('.delete_events').click(function (){
			 var answer = confirm('Vazne chcete polozku zmazat?');
  			 return answer // answer is a boolean
		});
	});
	{/literal}
</script>
<div class="add-new">
<a href="events/insert"><img src="/assets/gfx/new.png"/><span class="add-new-link">pridaj udalost</span></a>
</div>

<BR>
<table class="news_table" width="600">
<tr>
	<td clas="table_header">
		
	</td> 
	<td class="table_header">
		Datum
	</td>
	<td class="table_header">
		Zacatek
	</td>
	<td class="table_header">
		Nazov
	</td>
	<td class="table_header">
		Cena
	</td>
	<td  class="table_header">
		Tools
	</td>
</tr>
{foreach from=$events item=event}
	{include file='events/eventsblock.tpl'}
{/foreach}
</table>