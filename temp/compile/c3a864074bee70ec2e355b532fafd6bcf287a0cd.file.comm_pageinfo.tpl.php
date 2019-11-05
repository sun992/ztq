<?php /* smarty version smarty-3.1.8, created on 2019-10-30 11:31:10
         compiled from "tpl\comm_pageinfo.tpl" */ ?>
<?php /*%%smartyHeaderCode:173005db903fe3bb230-48579796%%*/if(!defined('smarty_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3a864074bee70ec2e355b532fafd6bcf287a0cd' => 
    array (
      0 => 'tpl\\comm_pageinfo.tpl',
      1 => 1571731317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173005db903fe3bb230-48579796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageinfo' => 0,
    'pagelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'smarty-3.1.8',
  'unifunc' => 'content_5db903fe441535_41617710',
),false); /*/%%smartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5db903fe441535_41617710')) {function content_5db903fe441535_41617710($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['pageinfo']->value['pagelist'])>1){?>
<div class="pageinfo">
	<?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['frist']==''){?>
	&nbsp;<span>首页</span>&nbsp;
	&nbsp;<span>上一页</span>
	<?php }else{ ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['frist'];?>
">&nbsp;首页</a>&nbsp;
	<a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['pre'];?>
">&nbsp;上一页</a>
	<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['pageinfo']->value['end']==''){?>
	&nbsp;<span>下一页</span>&nbsp;
	&nbsp;<span>尾页</span>&nbsp;
	<?php }else{ ?>
	&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['next'];?>
">下一页&nbsp;</a>
	&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['end'];?>
">尾页&nbsp;</a>
	<?php }?>
	
	&nbsp;<span>总计：<?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['maxpage'];?>
页 </span>&nbsp;<span><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value['recordcount'];?>
条记录</span>
	&nbsp;跳转至&nbsp; <?php $_smarty_tpl->tpl_vars['pagelist'] = new smarty_variable($_smarty_tpl->tpl_vars['pageinfo']->value['pagelist'], null, 0);?>
	<select onchange="gototheurl(this);">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pagelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<option value="<?php echo $_smarty_tpl->tpl_vars['pagelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['url'];?>
"<?php if ($_smarty_tpl->tpl_vars['pagelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['isselected']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['pagelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']]['num'];?>
</option>
	<?php endfor; endif; ?>
	</select>&nbsp;页
</div>
<?php }?>
<?php }} ?>