<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 添加商品类型 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/GoodsType/lst") ?>">商品类型列表</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index") ?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> - 添加商品类型 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="<?php echo U("Admin/GoodsType/add") ?>"enctype="multipart/form-data" >
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">商品类型名称</td>
                <td>
                    <input type="text" name="type_name" maxlength="60" value="" size="60" />
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
    </form>
</div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>