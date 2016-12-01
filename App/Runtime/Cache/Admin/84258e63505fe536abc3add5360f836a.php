<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 修改文章分类 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/ArticleCat/lst") ?>">文章分类</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index") ?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> - 修改文章分类 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="<?php echo U("Admin/ArticleCat/save") ?>" >
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">文章分类名称</td>
                <td>
                    <input type="text" name="cat_name" maxlength="60" value="<?php echo $article_cat_data['cat_name']?>" size="30" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">上级分类</td>
                <td>
                    <select name="parent_id">
                        <option  value="0">顶级分类</option>
                        <?php foreach ($article_cat as $k=>$v): ?>
                            <option  value="<?php echo $v['cat_id'];?>"
                                <?php if($v['cat_id'] == $article_cat_data['parent_id']):?>
                                 selected="selected"
                                <?php endif;?>
                                 style="padding-left: <?php echo 25*$v['level']?>px"><?php echo $v['cat_name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">分类类型</td>
                <td>
                    <select name="cat_type">
                        <?php foreach ($cat_type as $k=>$v): ?>
                            <option  value="<?php echo $k;?>"
                                <?php if($k == $article_cat_data['cat_type']):?>
                                    selected="selected"
                                <?php endif;?>
                            ><?php echo $v; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">排序</td>
                <td><input type="text" name="sort_order" value="<?php echo $article_cat_data['sort_order']?>"></td>
            </tr>
            <tr>
                <td class="label"><a href="javascript:void(0)"><img width="16" height="16" border="0" alt="点击此处查看提示信息" src="<?php echo C('IMG');?>/notice.gif"></a>关键字</td>
                <td>
                    <input type="text" value="<?php echo $article_cat_data['keywords']?>" size="50" maxlength="60" name="keywords">
                    <p>关键字为选填项，其目的在于方便外部搜索引擎搜索</p>
                </td>
            </tr>
            <tr>
                <td class="label">描述</td>
                <td>
                    <textarea  name="cat_desc" cols="60" rows="4"  ><?php echo $article_cat_data['cat_desc']?></textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
        <input type="hidden" name="cat_id" value="<?php echo $article_cat_data['cat_id']?>">
    </form>
</div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>