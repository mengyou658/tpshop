<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 修改节点 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/Node/lst") ?>">节点列表</a></span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index") ?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> -
        <?php if($node_data['rank'] == 1): ?>
           修改模块
        <?php elseif ($node_data['rank'] == 2):?>
           修改控制器
        <?php elseif ($node_data['rank'] == 3):?>
           修改方法
        <?php endif;?>
    </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form method="post" action="<?php echo U("Admin/Node/save") ?>"enctype="multipart/form-data" >
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">
                    <?php if($node_data['rank'] == 1): ?>
                    模块名称(英文)
                    <?php elseif ($node_data['rank'] == 2):?>
                    控制器名称(英文)
                    <?php elseif ($node_data['rank'] == 3):?>
                    方法名称(英文)
                    <?php endif;?>
                <td>
                    <input type="text" name="node_name" maxlength="60" value="<?php echo $node_data['node_name'];?>" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">
                    <?php if($node_data['rank'] == 1): ?>
                        模块名称(中文)
                    <?php elseif ($node_data['rank'] == 2):?>
                        控制器名称(中文)
                    <?php elseif ($node_data['rank'] == 3):?>
                        方法名称(中文)
                    <?php endif;?>
                </td>
                <td>
                    <input type="text" name="title" maxlength="60" size="40" value="<?php echo $node_data['title']?>" />
                </td>
            </tr>


            <tr>
                <td class="label">排序</td>
                <td>
                    <input type="text" name="sort_order" maxlength="40" size="15" value="<?php echo $node_data['sort_order']?>" />
                </td>
            </tr>
            <tr>
                <td class="label">开启状态</td>
                <td>
                    <input type="radio" name="node_status" value="1"
                           <?php if($node_data['node_status'] == 1): ?>
                           checked="checked"
                           <?php endif;?>
                    /> 开启
                    <input type="radio" name="node_status" value="0"
                        <?php if($node_data['node_status'] == 0): ?>
                            checked="checked"
                        <?php endif;?>
                    /> 关闭
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
            <input type="hidden" name="pid" maxlength="40" size="15" value="<?php echo $node_data['pid']; ?>" />
            <input type="hidden" name="rank" maxlength="40" size="15" value="<?php echo $node_data['rank']; ?>" />
            <input type="hidden" name="id" maxlength="40" size="15" value="<?php echo $node_data['id']; ?>" />
        </table>
    </form>
</div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>