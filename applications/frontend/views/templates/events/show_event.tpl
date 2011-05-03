<div class="event-show">
    <div class="event-show-foto">
        <img src="/media/events/se_{$event.EvePicture}" alt="">
        <div class="event-show-title">
            {$event.EveTitle}
        </div>
        <div class="event-show-full">
            <a href="/media/events/{$event.EvePicture}" target="_blank"><img src="/assets/gfx/resize.png"></a>
        </div>
    </div>
    {if !$event.EveTemp}
    <div class="event-show-data" style="display: block;">
			<div class="data">
				<div><span>Datum:</span> {$event.EveDate|date_format:"%d/%m/%Y"}</div>
				<div><span>Cas:</span> {$event.EveTime}</div> 		
				<div><span>Cena:</span> {$event.EvePrice},-</div>
			</div>
	</div>
	{/if}
	<div class="event-show-desc">
	    {$event.EveContent}
	</div>
</div>