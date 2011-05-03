{if $homeboxdata}
<div id="homebox">
    <ul id="homeboxContent">

        {foreach from=$homeboxdata item=boxdata}
            <li class="homeboxImage">
                <img src="{$boxdata.image}">
                <span><a href="{$boxdata.}">{$boxdata.text}</a></span>
            </li>
        {/foreach}

    <div class="clear homeboxImage"></div> 
    </ul>
</div>
{/if}