<?php /* Smarty version 2.6.26, created on 2010-12-06 18:40:01
         compiled from homebox.tpl */ ?>
<?php if ($this->_tpl_vars['homeboxdata']): ?>
<div id="homebox">
    <ul id="homeboxContent">

        <?php $_from = $this->_tpl_vars['homeboxdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['boxdata']):
?>
            <li class="homeboxImage">
                <img src="<?php echo $this->_tpl_vars['boxdata']['image']; ?>
">
                <span><a href=""><?php echo $this->_tpl_vars['boxdata']['text']; ?>
</a></span>
            </li>
        <?php endforeach; endif; unset($_from); ?>

    <div class="clear homeboxImage"></div> 
    </ul>
</div>
<?php endif; ?>