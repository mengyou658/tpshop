<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 文章列表 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/Article/add")?>">添加文章</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index")?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> -文章列表 </span>
    <div style="clear:both"></div>
</h1>
<div class="form-div">
    <form action="" name="searchForm">
        <img src="<?php echo C('img');?>/icon_search.gif" width="26" height="22" border="0" alt="search" />
        <input type="text" name="brand_name" size="15" />
        <input type="submit" value=" 搜索 " class="button" />
    </form>
</div>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>编号</th>
                <th>文章标题</th>
                <th>文章分类</th>
                <th>文章重要性</th>
                <th>是否显示</th>
                <th>添加日期</th>
                <th>操作</th>
            </tr>
            <?php foreach ($article_data as $k=>$v):?>
            <tr>
                <td>
                    <?php echo $v["article_id"]?>
                </td>
                <td align="center">
                    <?php echo $v["title"]?>
                </td>
                <td align="center"> <?php echo $cat_name[$v["cat_id"]]?></td>
                <td align="center">
                    <?php if($v["article_type"] == 1):?>
                       置顶
                    <?php elseif($v["article_type"] == 0):?>
                       普通
                    <?php endif;?>
                </td>
                <td align="center">
                    <?php if($v["is_open"] == 1):?>
                    <img src="<?php echo C("IMG");?>/yes.gif">
                    <?php elseif($v["is_open"] == 0):?>
                     <img src="<?php echo C("IMG");?>/no.gif">
                    <?php endif;?>
                </td>
                <td align="center"><?php echo date("Y-m-d H:i:s",$v["add_time"])?></td>
                <td align="center">
                    <a href="<?php echo U("Admin/Article/save",array('article_id'=>$v['article_id']))?>" title="编辑">编辑</a> |
                    <a onclick="return confirm('确定要删除吗');" href="<?php echo U("Admin/Article/delete",array('article_id'=>$v['article_id']))?>" title="删除">移除</a>
                </td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td align="center" nowrap="true" colspan="7">
                    <?php echo $page;?>
                </td>
            </tr>
        </table>
    </div>
</form>

<?php include_once "/assets/template/footer.php";?>
</body>
</html>