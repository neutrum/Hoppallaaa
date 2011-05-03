
<tr>
	<td>
		{if $event.EvePicture}
			<a target="_blank" href="/media/events/{$event.EvePicture}"><img src="/media/events/sc_{$event.EvePicture}"></a> 	
		{else}
			no<BR>picture
		{/if}
	</td>
	<td class="news_date">
		    <a href="events/edit/{$event.EveId}">{$event.EveDate}</a>
	</td>
	<td class="news_date">
		    {$event.EveTime}
	</td>
	<td class="news_title">              
		    <a href="events/edit/{$event.EveId}">{$event.EveTitle}</a>
	</td>
	<td class="event_price">              
		    {$event.EvePrice}.-
	</td>
	<td class="news_tools">
		<a href="events/edit/{$event.EveId}"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_events" href="events/delete/{$event.EveId}"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>