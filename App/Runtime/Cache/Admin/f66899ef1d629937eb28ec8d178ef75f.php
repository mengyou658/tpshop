<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 修改商品分类 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/Category/lst") ?>">商品分类</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index") ?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> - 修改商品分类 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="<?php echo U("Admin/Category/save") ?>">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">商品分类名称</td>
                <td>
                    <input type="text" name="cat_name" maxlength="60" value="<?php echo $cate['cat_name']?>" size="30" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">上级分类</td>
                <td>
                    <select name="parent_id">
                        <option  value="0">顶级分类</option>
                        <?php foreach ($categoryData as $k=>$v): ?>
                            <option  value="<?php echo $v['id'];?>"
                                    <?php if($v['id'] == $cate['parent_id']):?>
                                        selected="selected"
                                    <?php endif;?>
                                     style="padding-left: <?php echo 25*$v['level']?>px"><?php echo $v['cat_name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
            <input type="hidden" name="id" maxlength="60" value="<?php echo $cate['id']?>" size="30" />
        </table>
    </form>
</div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>