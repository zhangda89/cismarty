<?php /* Smarty version Smarty-3.1.17, created on 2014-09-30 01:59:12
         compiled from "D:\wamp\www\test.cismarty.dev\templates\admin\navmenu\add.html" */ ?>
<?php /*%%SmartyHeaderCode:24796542a0e70aa83d2-30153639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd89c0732f75addc09b077d5f56a7c8f9645bad6' => 
    array (
      0 => 'D:\\wamp\\www\\test.cismarty.dev\\templates\\admin\\navmenu\\add.html',
      1 => 1412042303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24796542a0e70aa83d2-30153639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'actionurl' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_542a0e70aeaa63_40257441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a0e70aeaa63_40257441')) {function content_542a0e70aeaa63_40257441($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/public/basic.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link href="/static/css/admin/common.css" type="text/css" rel="stylesheet" />
<body>
<div class="manageBoxs">
    <?php echo $_smarty_tpl->getSubTemplate ('admin/navmenu/choosenav.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="itemSrhBoxs">
        <ul class="keySearchBoxs"></ul>
    </div>
    <div class="formBoxs admin_table">
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['actionurl']->value;?>
" id="checkform"  name="checkform" enctype="multipart/form-data">
            <table width="100%" border="0" cellspacing="1" cellpadding="5">
                <tr class="tr1 vt">
                    <td class="td1" width="15%">&nbsp;&nbsp;所属父类<span style='color:#F30;'>*</span></td>
                    <td class="td2">&nbsp;&nbsp;
                        <select name="menu_from[sub]" id="sub">
                            <option value="0">作为一级菜单</option>
                            <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                        </select>
                    </td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;&nbsp;菜单名称<span style='color:#F30;'>*</span></td>
                    <td class="td2">&nbsp;&nbsp;<input type="text" class="input input_wb" style="width:200px;" id="name" name="menu_from[name]"></td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;&nbsp;自定义action</td>
                    <td class="td2">&nbsp;&nbsp;<input type="text" class="input input_wb" style="width:200px;" id="topkey" name="menu_from[topkey]"></td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;&nbsp;标识<span style='color:#F30;'>*</span></td>
                    <td class="td2">&nbsp;&nbsp;<input type="text" class="input input_wb" style="width:200px;" id="mkey" name="menu_from[mkey]"></td>
                </tr>
                <tr class="tr1 vt" id="icon_tr">
                    <td class="td1">&nbsp;&nbsp;图标样式<span style='color:#F30;'>*</span></td>
                    <td class="td2">&nbsp;&nbsp;<input type="text" class="input input_wb" style="width:200px;" id="icon" name="menu_from[icon]"></td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;&nbsp;显示顺序<span style='color:#F30;'>*</span></td>
                    <td class="td2">&nbsp;&nbsp;<input type="text" class="input input_wb" style="width:200px;" id="sort" name="menu_from[sort]"></td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;&nbsp;是否显示<span style='color:#F30;'>*</span></td>
                    <td class="td2">
                        &nbsp;&nbsp;<label><input type="radio" value="0" id="isopen0" name="menu_from[isopen]">&nbsp;不显示</label>
                        &nbsp;&nbsp;<label><input type="radio" value="1" checked id="isopen1" name="menu_from[isopen]">&nbsp;显示</label>
                    </td>
                </tr>
                <tr class="tr1 vt">
                    <td class="td1">&nbsp;</td>
                    <td class="td2">
                        <input type="hidden" value="save" id="action" name="submitted">
                        <span class="btn"><span><button type="submit" value="提  交" id="submitFrom" name="submit">提 交</button></span></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#submitFrom').click(function() {
            var options = {
                beforeSubmit: function() {
                },
                success: function(txt) {
                    if (txt == 1) {
                        altTip('信息更新成功！', 'succeed', function() {
                            location.reload();
                            //location.href='/admin/admincp.php?action=menu&admintype=list';
                        });
                        return false;
                    } else {
                        altTip('信息更新失败！', 'error', function() {
                        });
                        return false;
                    }
                }
            };
            $('#checkform').ajaxSubmit(options);
            return false;
        });

        $('#sub').change(function(){
            if ($(this).val() == 0){
                $('#icon_tr').show();
            } else {
                $('#icon_tr').hide();
            }
        });
    });
</script>
</body>
</html><?php }} ?>
