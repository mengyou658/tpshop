<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 修改会员 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/User/lst") ?>">会员列表</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index") ?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> - 修改会员 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="<?php echo U("Admin/User/save") ?>">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">会员名称</td>
                <td>
                    <input type="text" name="username" maxlength="60" size="40" <?php if(!empty($userData['username'])):?>readonly="readonly"<?php endif;?> value="<?php echo $userData['username']?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">会员密码</td>
                <td>
                    <input type="text" name="password" maxlength="60" size="40" value="" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">手机号码</td>
                <td>
                    <input type="text" name="phone_number" maxlength="60" size="40"  <?php if(!empty($userData['phone_number'])):?>readonly="readonly"<?php endif;?> value="<?php echo $userData['phone_number']?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">邮箱地址</td>
                <td>
                    <input type="text" id="email" name="email" maxlength="60" size="40" <?php if(!empty($userData['email'])):?>readonly="readonly"<?php endif;?> value="<?php echo $userData['email']?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
        <input type="hidden" name="user_id" value="<?php echo $userData['user_id']?>" />
    </form>
</div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>