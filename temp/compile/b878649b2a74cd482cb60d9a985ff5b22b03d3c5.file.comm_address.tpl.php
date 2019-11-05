<?php /* smarty version smarty-3.1.8, created on 2019-10-30 11:31:10
         compiled from "tpl\comm_address.tpl" */ ?>
<?php /*%%smartyHeaderCode:137095db903fe1891a4-78434441%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b878649b2a74cd482cb60d9a985ff5b22b03d3c5' => 
    array (
      0 => 'tpl\\comm_address.tpl',
      1 => 1572406222,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137095db903fe1891a4-78434441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db903fe1de895_11861375',
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db903fe1de895_11861375')) {function content_5db903fe1de895_11861375($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['address']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total']);
?>
  <?php if ($_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['url']==''){?>
    <?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['a']['last']){?> 
        <?php echo $_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>

    <?php }else{ ?>
        <font class="cl"><?php echo $_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</font>
    <?php }?>  
  <?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['address']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['title'];?>
</a>
    <?php if (!$_smarty_tpl->getVariable('smarty')->value['section']['a']['last']){?>
    &nbsp;&gt;&nbsp;
    <?php }?>
  <?php }?>    
<?php endfor; endif; ?><?php }} ?>