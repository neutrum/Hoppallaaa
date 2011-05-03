
{if $update}
	{assign var='action' value='/admin/gallery/update'}
{else}
	{assign var='action' value='save'}
{/if}
<form method="post" action="{$action}">
	{if $update}
		<input type="hidden" name='galleryData[GalID]' value="{$galleryData.GalID}">
	{/if}
	<div class="form-block">
		<div class="form-label">Nazov:</div>
		<div class="form-input"><input type="text" name='galleryData[GalTitle]' value="{$galleryData.GalTitle}"></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>
