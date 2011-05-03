<script>
	{literal}
		$(document).ready(function() {
			$('.add_new').live('click', function() {
				// little hack to get the html with wapping element 
				var html = $('<div>').append(buildBox().clone()).remove().html();
				$(this).parent().parent().parent().after('<tr><td>'+html+'</tr></td>');
				return false;
			});
			
			$('.remove').live('click', function() {
			   $(this).parent().parent().parent().remove();
			});
			
			$('.move_down,.move_up').live('click', function() {
			   	var row = $(this).parents("tr:first");
        		if ($(this).is(".move_up")) {
            		row.insertBefore(row.prev());
        		} else {
            		row.insertAfter(row.next());
        		}
			});
			
			$('.item').live('mouseover mouseout',function(event){
				if (event.type == 'mouseover') {
					$(this).addClass('hovered');
				} else if (event.type == 'mouseout') {
					$(this).removeClass('hovered');			
				}
			});
			
			function buildBox()
			{
				var currentCount = $('#cntTotal').val();
				currentCount++;
				var newDiv = $('<div class="item"></div>');
				newDiv.append('<div class="item_name">Nazov polozky:<input type="text" name="itemData['+currentCount+'][ItmTitle]"></div>');
				newDiv.append('<div class="item_price">Cena polozky:<input type="text" name="itemData['+currentCount+'][ItmPrice]"></div>');
				newDiv.append('<div class="item_desc">Popis polozky (nepovinne):<input type="text" name="itemData['+currentCount+'][ItmDesc]"></div>');
				newDiv.append('<div class="item_tool"><span><img class="add_new" src="/assets/gfx/new.png"></span> <span><img class="remove" src="/assets/gfx/remove.png"></span> <span><img class="move_up" src="/assets/gfx/arrup.png"></span> <span><img class="move_down" src="/assets/gfx/arrdown.png"></span></div>');
				$('#cntTotal').val(currentCount);
				return newDiv;
			}
		});
	{/literal}
</script>
<div class="category_name">
	<b>Nazov kategorie: </b>{$catData.MenTitle}
</div>
<div class="category_items">
<form action="/admin/menu/saveitems" method="post">
<input type="hidden" name="category_id" value="{$catData.MenId}">
<table id="item_list">
{assign var='countTotal' value=0}                         
{if $items}

 	{foreach from=$items item=item name=itempool}
		<tr><td>
		<div id="item_{$smarty.foreach.itempool.index}" class="item">
			 <div class="item_name">
		 		Nazov polozky:<input type="text" name="itemData[{$smarty.foreach.itempool.index}][ItmTitle]" value="{$item.ItmTitle}">
			 </div>
			 <div class="item_price">
		 		Cena polozky:<input type="text" name="itemData[{$smarty.foreach.itempool.index}][ItmPrice]" value="{$item.ItmPrice}">
			 </div>
			 <div class="item_desc">
		 		Popis polozky (nepovinne):<input type="text" name="itemData[{$smarty.foreach.itempool.index}][ItmDesc]" value="{$item.ItmDesc}">
			 </div>
			 <div class="item_tool">
			 			 	<span><img class="add_new" src="/assets/gfx/new.png"></span>
			 				<span><img class="remove" src="/assets/gfx/remove.png"></span>
			 				<span><img class="move_up" src="/assets/gfx/arrup.png"></span>
			 				<span><img class="move_down" src="/assets/gfx/arrdown.png"></span>	
			 </div>
		</div>
	</td></tr>
	{assign var='nextItem' value=`$nextItem+1`}
	{/foreach}
{else}
{assign var='nextItem' value=`$countTotal+1`}
<tr>
 <td>
	<div id="item_{$nextItem}" class="item">
				 <div class="item_name">
		 			Nazov polozky:<input type="text" name="itemData[{$nextItem}][ItmTitle]" value="{$item.ItmTitle}">
				 </div>
				 <div class="item_price">
		 			Cena polozky:<input type="text" name="itemData[{$nextItem}][ItmPrice]" value="{$item.ItmPrice}">
				 </div>
				 <div class="item_desc">
		 			Popis polozky (nepovinne):<input type="text" name="itemData[{$nextItem}][ItmDesc]" value="{$item.ItmDesc}">
				 </div>
				 <div class="item_tool">
			 		<span><img class="add_new" src="/assets/gfx/new.png"></span>
			 		<span><img class="remove" src="/assets/gfx/remove.png"></span>
			 		<span><img class="move_up" src="/assets/gfx/arrup.png"></span>
			 		<span><img class="move_down" src="/assets/gfx/arrdown.png"></span>	
				 </div>
	</div>
 </td>
</tr>
{/if}
</table>
   <input id="cntTotal" type="hidden" value="{$nextItem}">		
   <div class="submit-button">
   	<input type="submit" name="submit" value="Uloz">
   </div>
</form>
</div>