<?php /* Smarty version Smarty-3.1.17, created on 2014-09-25 08:14:02
         compiled from "D:\wamp\www\test.cismarty.dev\templates\admin\markoperation\index.html" */ ?>
<?php /*%%SmartyHeaderCode:313605423ce9ec48974-83365461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ef6c45f94ccdaec69476c78ae3fa64169fe74a7' => 
    array (
      0 => 'D:\\wamp\\www\\test.cismarty.dev\\templates\\admin\\markoperation\\index.html',
      1 => 1411632840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313605423ce9ec48974-83365461',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5423ce9ecae285_37521993',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5423ce9ecae285_37521993')) {function content_5423ce9ecae285_37521993($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/public/basic.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="/static/css/admin/common.css" type="text/css" rel="stylesheet" />
<body>
<div class="mainBoxs">
    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td id="leftSonNavBox" valign="top" width="150" height="100%"><div class="leftSonNavBox"><?php echo $_smarty_tpl->getSubTemplate ("admin/public/basic_nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div></td>
            <td width="9" height="100%" valign="top"><div id="navToggler" class="navToggler">&nbsp;</div></td>
            <td valign="top" height="100%" id="bodyMainBoxs">
                <iframe src="#" name="targetBoxs" scrolling="0" frameborder="0" height="100%"></iframe>&nbsp;
            </td>
        </tr>
    </table>
</div>
<script type='text/javascript'>
    $(function() {
        //二级菜单点击效果
        $('.sonNavBox a').click(function() {
            $('.sonNavBox a').removeClass('current');
            $(this).addClass('current');
        }).first().trigger('click');

        var url = $('.sonNavBox a').first().attr('href');
        $('#bodyMainBoxs').find('iframe').attr('src', url);

        var b_height = $('body').height();
        $('.leftSonNavBox').height(b_height);
        $('#navToggler').height(b_height);
        $('#bodyMainBoxs').height(b_height);
    });
</script>
</body>
</html><?php }} ?>
