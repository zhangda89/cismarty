<?php /* Smarty version Smarty-3.1.17, created on 2014-10-29 17:22:42
         compiled from "/Users/davidzhang/php/php_project/ci_project/cismarty/templates/admin/index.html" */ ?>
<?php /*%%SmartyHeaderCode:176853679454512262ea4e95-11221718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc96e94cc80609341cb1f0cbec30fa62850e69b' => 
    array (
      0 => '/Users/davidzhang/php/php_project/ci_project/cismarty/templates/admin/index.html',
      1 => 1412071748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176853679454512262ea4e95-11221718',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_menus' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5451226307d606_95854821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5451226307d606_95854821')) {function content_5451226307d606_95854821($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admin/public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="mainBoxs">
    <div class="leftNavBoxs">
        <div id="topArrow" class="topArrow" onmouseout="removeCss(this)" onmouseover="addCss(this)"></div>
        <div class="lkMenu switch">
            <ul id="UI">
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                <?php if (allowShow($_smarty_tpl->tpl_vars['v']->value['mkey'])) {?>
                <li><a title="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" target="main" href="<?php echo site_url("admin/".((string)$_smarty_tpl->tpl_vars['v']->value['mkey'])."/index");?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
"></i><span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span></a></li>
                <?php }?>
                <?php } ?>
            </ul>
        </div>
        <div id="bottomArrow" class="bottomArrow"></div>
    </div>
    <div class="rightNavBoxs">
        <iframe src="<?php echo site_url("admin/main/index");?>
" frameborder="0" name="main"></iframe>
    </div>
</div>
<script type="text/javascript">
    //更改顶部样式
    function ChangeNavigationClass(obj) {
        $(obj).addClass("current").siblings("li").removeClass("current");
    }
    function addCss(obj) {
        $(obj).addClass("topArrowMouseover");
    }
    function removeCss(obj) {
        $(obj).removeClass().addClass("topArrow");
    }
    $(document).ready(function() {
        $("#Ul li:first-child").addClass("current");
        $("#bottomArrow").on('mouseenter',function() {
            $(this).addClass("bottomArrowMouseover");
        }).on('mouseleave',function() {
            $(this).removeClass("bottomArrowMouseover").addClass("bottomArrow");
        });
        $(".switch").Scroll({line: 1, speed: 200, up: "bottomArrow", down: "topArrow"});
        $("#UI").find("a").click(function() {
            $(this).parent().addClass("current").siblings().removeClass("current");
        });
    });

    //消息提醒
    function showWarningToast(message) {
        $().toastmessage('showWarningToast', message);
    }

    function borrow_message(){
        setInterval(function(){
            $.ajax({
                url:'<?php echo site_url("admin/request/ajax");?>
',
                data:{'act':'borrow_message'},
                dataType:'json',
                type:'post',
                success:function(o){
                    if(o.status == 'ok' && o.msg){
                        showWarningToast(o.msg);
                    }
                }
            });
        },5000);
    }
//    borrow_message();
</script>
</body>
</html><?php }} ?>
