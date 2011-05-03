<div class="form-news">
{if $update}
	{assign var='action' value='/admin/news/update'}
{else}
	{assign var='action' value='save'}
{/if}
<form method="post" action="{$action}">
	{if $update}
		<input type="hidden" name='newsData[NwsId]' value="{$newsData.NwsId}">
	{/if}
	<div class="form-block">
		<span class="form-label">Nazov:</span>
		<div class="form-input"><input type="text" name='newsData[NwsTitle]' value="{$newsData.NwsTitle}"></div>
    </div>
	<div class="form-block">
		<span class="form-label">Obsah:</span>
		<div class="form-textarea"> <textarea name="newsData[NwsContent]">{$newsData.NwsContent}</textarea></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>
</form>