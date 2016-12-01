<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo C('shopName');?> - 节点管理 </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="<?php echo C('css');?>/jquery.tbltree.css" rel="stylesheet">
    <script src="<?php echo C('js');?>/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo C('js');?>/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo C('js');?>/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo C('js');?>/jquery.tbltree.js"></script>
    <script src="<?php echo C('js');?>/scale.fix.js"></script>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        $(function() {
            $( "#node" ).tbltree({
                treeColumn: 0,
                saveState: true
            });
        });
    </script>
</head>
<style>
    #node a{text-decoration: none;}
</style>
<body>
<h1>
<!--    <span class="action-span"><a href="--><?php ?><!--">添加模块</a></span>-->
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index")?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> -节点管理 </span>
    <div style="clear:both"></div>
</h1>
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1" id="node">
            <?php foreach ($node_data as $k=>$v):?>
            <tr align="left" row-id="<?php echo $v['id'];?>" <?php if($v['pid']):?> parent-id="<?php echo $v['pid'] ?>" <?php endif;?>>
                <td>
                    <?php echo $v['title']?>
                    <?php if($v['rank'] == 1): ?>
                        【<a href="<?php echo U("Admin/Node/add/",array('rank'=>2,'pid'=>$v['id']))?>">添加控制器</a>】
                        <?php elseif ($v['rank'] == 2): ?>
                        [<a href="<?php echo U("Admin/Node/add/",array('rank'=>3,'pid'=>$v['id']))?>">添加方法</a>]
                        [<a href="<?php echo U("Admin/Node/save/",array('id'=>$v['id']))?>">修改</a>]
                        [<a  onclick="return confirm('确定要删除吗');"  href="<?php echo U("Admin/Node/delete/",array('id'=>$v['id']))?>">删除</a>]
                        <?php elseif ($v['rank'] == 3): ?>
                        [<a href="<?php echo U("Admin/Node/save/",array('id'=>$v['id']))?>">修改</a>] |
                        [<a  onclick="return confirm('确定要删除吗');"  href="<?php echo U("Admin/Node/delete/",array('id'=>$v['id']))?>">删除</a>]
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
<?php include_once "/assets/template/footer.php";?>
</body>
</html>