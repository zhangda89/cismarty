<?php /* Smarty version Smarty-3.1.17, created on 2014-09-30 06:13:35
         compiled from "D:\wamp\www\test.cismarty.dev\templates\admin\setting\core.html" */ ?>
<?php /*%%SmartyHeaderCode:23114542a138b139169-02117997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4fea16dafb8915007b72a1a83fb2c1315128f46' => 
    array (
      0 => 'D:\\wamp\\www\\test.cismarty.dev\\templates\\admin\\setting\\core.html',
      1 => 1412057613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23114542a138b139169-02117997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_542a138b1d5580_23383670',
  'variables' => 
  array (
    'actionurl' => 0,
    'config' => 0,
    'timezone' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a138b1d5580_23383670')) {function content_542a138b1d5580_23383670($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\wamp\\www\\test.cismarty.dev\\application\\libraries\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("admin/public/basic.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body>
        <div class="manageBoxs">
            <h1><i></i>系统设置 &raquo; 功能设置</h1>
            <div class="formBoxs admin_table">
                <form name="FORM" method="post" action="<?php echo $_smarty_tpl->tpl_vars['actionurl']->value;?>
" id="coreFrom" enctype="multipart/form-data">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tr class="tr2 td_bgB">
                            <td width="150">设置说明</td>
                            <td width="300">设置内容</td>
                            <td >	调用变量</td>
                        </tr>
                        <tbody>
                        <tr class="tr1 vt">
                            <td class="td1">GZIP压缩输出</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_gzip']==1) {?>checked<?php }?> name="config[lk_gzip]" value="1" class="radio">&nbsp;开启
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_gzip']==0) {?>checked<?php }?> name="config[lk_gzip]" value="0" class="radio">&nbsp;关闭
                            </td>
                            <td class="td2">
                                <div class="help_a" style="display: block;">
                                    [lk_gzip]&nbsp;&nbsp;将页面内容以 gzip 压缩后传输，可以加快传输速度，需 PHP 4.0.4 以上且支持 Zlib 模块才能使用。
                                </div>
                            </td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">URL重写</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_rewrite']==1) {?>checked<?php }?> name="config[lk_rewrite]" value="0" class="radio">&nbsp;标准 URL 模式
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_rewrite']==0) {?>checked<?php }?> name="config[lk_rewrite]" value="1" class="radio">&nbsp;伪静态模式
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_rewrite]&nbsp;&nbsp;URL重写能够实现链接的伪静态化，以便搜索引擎获取其中的内容。<br/>
                                开启此功能之前请确认您的服务器已经支持伪静态正则，否则将出现页面无法打开的错误。
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">动态缓存生存周期</td>
                            <td class="td2"><input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_cachetime'];?>
" name="config[lk_cachetime]"></td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_cachetime]&nbsp;&nbsp;（单位：秒）开启动态缓存能有效的降低服务器负载，默认值为：900秒。
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">邮件密码取回</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_getpw']==1) {?>checked<?php }?> name="config[lk_getpw]" value="1" class="radio">&nbsp;开启
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_getpw']==0) {?>checked<?php }?> name="config[lk_getpw]" value="0" class="radio">&nbsp;关闭       </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_getpw]&nbsp;&nbsp;开启密码邮件取回功能，当会员忘记密码时，系统会发送密码到会员的注册邮箱。
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">时区设置</td>
                            <td class="td2">
                                <select name=config[lk_timezone]>
                                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['timezone']->value,'selected'=>$_smarty_tpl->tpl_vars['config']->value['lk_timezone']),$_smarty_tpl);?>

                                </select>

                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_timezone]&nbsp;&nbsp;所在的服务器是放在地球的哪个时区。

                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">时间格式</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_timeformat']==1) {?>checked<?php }?> name="config[lk_timeformat]" value="1" class="radio">&nbsp;24小时
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_timeformat']==0) {?>checked<?php }?> name="config[lk_timeformat]" value="0" class="radio">&nbsp;12小时       </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_timeformat]&nbsp;&nbsp; 24小时格式或者12小时格式。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">日期格式</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_dateformat'];?>
" name="config[lk_dateformat]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_dateformat]&nbsp;&nbsp;<br/><span class="s1">Y</span>：4 位数字完整表示的年份 <span class="s1">y</span>：2 位数字表示的年份<br/>
                                <span class="s1">m</span>：数字表示的月份，01 到 12 <span class="s1">n</span>：数字表示的月份，1 到 12<br/>
                                <span class="s1">d</span>：月份中的第几天，有前导零的 2 位数字 <span class="s1">j</span>：月份中的第几天，没有前导零<br/>
                                示例： Y-m-d 用来表示 2007-10-01。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">页面刷新时间限制</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_refreshtime'];?>
" name="config[lk_refreshtime]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_refreshtime]&nbsp;&nbsp;（单位：秒）多少秒内刷新页面被视为恶意刷新，0 为不限制。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">搜索时间限制</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_maxsearchctrl'];?>
" name="config[lk_maxsearchctrl]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_maxsearchctrl]&nbsp;&nbsp;（单位：秒）两次搜索间隔小于此时间将被禁止，0 为不限制。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">在线用户统计时间</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_online'];?>
" name="config[lk_online]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_online]&nbsp;&nbsp;（单位：分钟）两次搜索间隔小于此时间将被禁止，0 为不限制。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">页脚显示程序运行时间</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_exectime']==1) {?>checked<?php }?> name="config[lk_exectime]" value="1" class="radio">&nbsp;开启
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_exectime']==0) {?>checked<?php }?> name="config[lk_exectime]" value="0" class="radio">&nbsp;关闭
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_exectime]&nbsp;&nbsp;（单位：秒）两次搜索间隔小于此时间将被禁止，0 为不限制。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">COOKIE 前缀</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_ckpre'];?>
" id="ckpre" name="config[lk_ckpre]">
                                <input type="button" onClick="suggestKey('ckpre', 8)" value="生成随机前缀">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_ckpre]&nbsp;&nbsp;标识网站的一个随机序列，无特殊情况，请勿随意修改。修改后需要重新登陆后台！
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">COOKIE 有效目录</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_ckpath'];?>
" id="ckpath" name="config[lk_ckpath]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_ckpath]&nbsp;&nbsp;使一个空间放置多个网站，都能访问!(如果您网站在yybus目录下可以设置为/yybus/ 或为 /)。
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">COOKIE 有效域名</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_ckdomain'];?>
" id="ckpre" name="config[lk_ckdomain]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_ckdomain]&nbsp;&nbsp;要使 cookie 能在如 55like.com 域名下的所有子域都有效的话，该参数应该设为 ".55like.com"。
                                <br/> 虽然 "." 并不必须的，但加上它会兼容更多的浏览器。如果该参数设为 www.55like.com 的话，就只在 www 子域内有效。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td class="td1">后台超时限制</td>
                            <td class="td2">
                                <input class="input input_wa" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lk_cpovertime'];?>
" id="cpovertime" name="config[lk_cpovertime]">
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_cpovertime]&nbsp;&nbsp;（秒） 在设定时间范围内无任何操作，后台将自动退出。最短不能小于60秒
                            </div></td>
                        </tr>

                        <tr class="tr1 vt">
                            <td class="td1">搜索引擎爬行记录</td>
                            <td class="td2">
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_robots']==1) {?>checked<?php }?> name="config[lk_robots]" value="1" class="radio">&nbsp;开启
                                <input type="radio" <?php if ($_smarty_tpl->tpl_vars['config']->value['lk_robots']==0) {?>checked<?php }?> name="config[lk_robots]" value="0" class="radio">&nbsp;关闭
                            </td>
                            <td class="td2"><div class="help_a" style="display: block;">
                                [lk_robots]&nbsp;&nbsp;选择“开启”将记录搜索蜘蛛爬行踪迹，站长可以依据日志文件了解搜索优化情况，本功能会轻微增加系统负担。
                            </div></td>
                        </tr>
                        <tr class="tr1 vt">
                            <td align="right" class="td1">&nbsp;</td>
                            <td class="td2" colspan="2"><input type="hidden" name="cid" id="cid" value="25" />
                                <input type="hidden" name="submitted" id="submitted" value="save" />
                                <span id="lk_submit"><a href="javascript:;" id="submitFrom">提交</a></span>
                                <span id="lk_submit"><a href="javascript:;" id="resetBtn">重填</a></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $('#submitFrom').click(function() {
                    var options = {
                        beforeSubmit: function() {
                        },
                        success: function(txt) {
                            if (txt == 1) {
                                altTip('信息更新成功！', 'succeed', function() {
                                    location.reload();
                                });
                                return false;
                            } else {
                                altTip('信息更新失败！', 'error', function() {
                                });
                                return false;
                            }
                        }
                    };
                    $('#coreFrom').ajaxSubmit(options);
                    return false;
                });
            });
        </script>
    </body>
</html><?php }} ?>
