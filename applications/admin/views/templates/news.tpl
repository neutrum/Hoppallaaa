<script type="text/javascript" src="/assets/js/ui.admin.js"></script>   
<script>
	{literal}
	$(document).ready(function() 
	{
		$('.delete_news').click(function (){
			 var answer = confirm('Vazne chcete polozku zmazat?');
  			 return answer // answer is a boolean
		});
	});
	{/literal}
</script>
<div class="add-new">
	<a href="news/insert"><img src="/assets/gfx/new.png"/><span class="add-new-link"> pridaj novinku</span></a>
</div>

<BR>
<table class="news_table" width="600">
<tr> 
	<td class="table_header">
		Datum
	</td>
	<td class="table_header">
		Nazov
	</td>
	<td  class="table_header">
		Tools
	</td>
</tr>
{foreach from=$news item=new}
	{include file='news/newsblock.tpl'}
{/foreach}
</table>