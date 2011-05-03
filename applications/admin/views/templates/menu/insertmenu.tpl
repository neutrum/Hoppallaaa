
{if $update}
	{assign var='action' value='/admin/menu/update'}
{else}
	{assign var='action' value='save'}
{/if}
<form method="post" action="{$action}">
	{if $update}
		<input type="hidden" name='catData[MenId]' value="{$catData.MenId}">
	{/if}
	<div class="form-block">
			<div class="form-label">Nazov kategorie:</div>
	</div>
	<div class="form-block"> 
			<div class="form-input"><input type="text" name='catData[MenTitle]' value="{$catData.MenTitle}"></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>
