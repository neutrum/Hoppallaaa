<div class="section-title">
    <img src="/assets/gfx/Menu.png" alt="">
</div>
<div class="clear"></div>
{foreach from=$menu item=menu_item}
    <div class="menu-block">
        <div class="menu-title">
            {$menu_item.MenTitle}
        </div>
        <div class="menu-items">
            {foreach from=$menu_item.items item=item_data}
                <div class="item-data" style="">
                    <div class="item-data-title">
                        {$item_data.ItmTitle}
                    </div>
                    <div class="item-data-price">
                            {$item_data.ItmPrice},-
                    </div>
                    {if $item_data.ItmDesc}
                        <div class="item-data-desc">
                            {$item_data.ItmDesc}
                        </div>
                    {/if}
                </div>
                <div class="clear"></div>
            {/foreach}
        </div>
    </div>
{/foreach}