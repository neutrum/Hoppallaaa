<div class="clear"></div>
    {include file='homebox.tpl'}
<div class="opening-hours">
    {include file='opening.tpl'}
</div>
<div class="section-title">
    <img src="/assets/gfx/Home.png" alt="">
</div>
<div class="clear"></div>
{foreach from=$news item=new}
	<div class="news-block">
		<div class="news-date">
		    <span class="point">p</span><span class="date">{$new.NwsDate}</span>
		</div>
		<div class="news-title">
			{$new.NwsTitle}
		</div>
		<div class="news-desc">
		    {$new.NwsContent}
				<div class="clear"></div>
		    <div class="news-by">administrator</div>
		</div>
		<div class="news-footer">
		
		</div>
	</div>
{/foreach} 