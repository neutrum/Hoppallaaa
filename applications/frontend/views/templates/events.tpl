<script>
{literal}
	$(document).ready(function() {
		$('.event-title').mouseover(function() {
			$('.event-block').children('.event-data').slideToggle('fast');
		}).mouseout(function() {
			$('.event-block').children('.event-data').slideToggle('fast');
		});
	});
{/literal}
</script>
<div class="section-title">
    <img class="intitle" src="/assets/gfx/Akce.png" alt="">
</div>
<div class="clear"></div>
{foreach from=$events item=event}
	<div class="event-block">
		<div class="event-data">
			<div class="data">
				<div><span>Datum:</span> {$event.EveDate|date_format:"%d/%m/%Y"}</div>  
				<div><span>Cas:</span> {$event.EveTime}</div> 		
				<div><span>Cena:</span> {$event.EvePrice} CZK</div> 
			</div>
		</div>
		<div class="event-title">
			<a href="/events/show/{$event.EveId}">{$event.EveDate|date_format:"%d/%m/%Y"} {$event.EveTitle}</a>
		</div>
		<img src="/media/events/fesc_{$event.EvePicture}">
	</div>
{/foreach}