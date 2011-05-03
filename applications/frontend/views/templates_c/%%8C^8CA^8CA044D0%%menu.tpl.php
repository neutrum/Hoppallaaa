<?php /* Smarty version 2.6.26, created on 2010-11-23 15:10:50
         compiled from menu.tpl */ ?>
<div class="section-title">
    <img src="/assets/gfx/Menu.png" alt="">
</div>
<div class="clear"></div>
<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu_item']):
?>
    <div class="menu-block">
        <div class="menu-title">
            <?php echo $this->_tpl_vars['menu_item']['MenTitle']; ?>

        </div>
        <div class="menu-items">
            <?php $_from = $this->_tpl_vars['menu_item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item_data']):
?>
                <div class="item-data" style="">
                    <div class="item-data-title">
                        <?php echo $this->_tpl_vars['item_data']['ItmTitle']; ?>

                    </div>
                    <div class="item-data-price">
                            <?php echo $this->_tpl_vars['item_data']['ItmPrice']; ?>
,-
                    </div>
                    <?php if ($this->_tpl_vars['item_data']['ItmDesc']): ?>
                        <div class="item-data-desc">
                            <?php echo $this->_tpl_vars['item_data']['ItmDesc']; ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>
<?php endforeach; endif; unset($_from); ?>