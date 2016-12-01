<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo C('shopName');?> - 添加新商品 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo C('css');?>/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo C('css');?>/main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo C('js');?>/jquery-1.4.2.min.js"></script>
<script src="<?php echo C('ueditor');?>/ueditor.config.js"></script>
<script src="<?php echo C('ueditor');?>/ueditor.all.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo U("Admin/Goods/lst")?>">商品列表</a>
    </span>
    <span class="action-span1"><a href="<?php echo U("Admin/Index/index")?>"><?php echo C('shopName');?></a></span>
    <span id="search_id" class="action-span1"> - 添加新商品 </span>
    <div style="clear:both"></div>
</h1>

<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front">基本信息</span>
            <span class="tab-back">商品描述</span>
            <span class="tab-back">会员价格</span>
            <span class="tab-back">商品属性</span>
            <span class="tab-back">商品相册</span>
        </p>
    </div>
    <form enctype="multipart/form-data" action="<?php echo U("Admin/Goods/add")?>" method="post">
    <div id="tabbody-div" class="tabbody-div">
            <table width="90%" id="general-table" align="center">
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="goods_name" value=""size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品货号： </td>
                    <td>
                        <input type="text" name="goods_sn" value="" size="20"/>
                        <span id="goods_sn_notice"></span><br />
                        <span class="notice-span"id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品分类：</td>
                    <td>
                        <select name="cat_id">
                            <option value="">请选择...</option>
                            <?php foreach ($categoryData as $k=>$v): ?>
                                <option  value="<?php echo $v['id'];?>" style="padding-left: <?php echo 25*$v['level']?>px"><?php echo $v['cat_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <select name="brand_id">
                            <option value="">请选择...</option>
                            <?php foreach ($brandData as $k=>$v): ?>
                                <option  value="<?php echo $v['brand_id'];?>"><?php echo $v['brand_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td>
                        <input type="text" name="shop_price" value="0" size="20"/>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">商品数量：</td>
                    <td>
                        <input type="text" name="goods_number" size="8" value=""/>
                    </td>
                </tr>
                <tr>
                    <td class="label">是否上架：</td>
                    <td>
                        <input type="radio" name="is_onsale" value="1"/> 是
                        <input type="radio" name="is_onsale" value="0"/> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">加入推荐：</td>
                    <td>
                        <input type="checkbox" name="is_best" value="1" /> 精品 
                        <input type="checkbox" name="is_new" value="1" /> 新品 
                        <input type="checkbox" name="is_hot" value="1" /> 热销
                    </td>
                </tr>
                <tr>
                    <td class="label">推荐排序：</td>
                    <td>
                        <input type="text" name="sort_order" size="5" value="100"/>
                    </td>
                </tr>
                <tr>
                    <td class="label">市场售价：</td>
                    <td>
                        <input type="text" name="market_price" value="0" size="20" />
                    </td>
                </tr>
                <tr>
                    <td class="label">商品关键词：</td>
                    <td>
                        <input type="text" name="keywords" value="" size="40" /> 用空格分隔
                    </td>
                </tr>
                <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <input type="file" name="goods_img" size="35" />
                    </td>
                </tr>
                <tr>
                    <td class="label">商品简单描述：</td>
                    <td>
                        <textarea name="goods_brief" cols="40" rows="3"></textarea>
                    </td>
                </tr>
            </table>

    </div>
    <!--商品描述开始-->
    <div class="tabbody-div" style="display:none;">
        <textarea name="Info[goods_desc]" id="goods_desc"></textarea>
        <script>
            // 把textarea替换成一个编辑器
            UE.getEditor('goods_desc',{
                initialFrameWidth:"100%",
                initialFrameHeight:"300"
            });
        </script>
    </div>
     <!--商品描述结束-->
    <!--会员价格开始-->
    <div class="tabbody-div" style="display:none;">
        <p style="text-align:center;color: green">如果不填，代表使用会员等级的折扣率</p>
        <table width="100%">
            <?php foreach ($userRankData as $k => $v): ?>
            <tr>
                <td class="label"><?php echo $v['level_name'];?>:</td>
                <td><input type="text" name="userRank[<?php echo $v['id']?>]" /></td>
            </tr>
            <?php endforeach;?>

        </table>
    </div>
    <!--会员价格结束-->
    <div class="tabbody-div" style="display:none;">
        <table width="100%" id="attrContent">
            <tr>
                <td class="label">商品类型:</td>
                <td>
                    <select id="type_id" name="Info[type_id]">
                        <option value="">请选择商品类型</option>
                        <?php foreach ($goodsTypeData as $k=>$v):?>
                        <option value="<?php echo $v['id']?>"><?php echo $v['type_name']?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
        </table>
<!--        <table width="50%" id="attrContent" align="center"></table>-->
<!--        <div id="attrContent"></div>-->

    </div>
    <div class="tabbody-div" style="display:none;">图片</div>

        <div class="button-div">
            <input type="submit" value=" 确定 " class="button"/>
            <input type="reset" value=" 重置 " class="button" />
        </div>
    </form>
</div>

<?php include_once "/assets/template/footer.php";?>
</body>
</html>
<script>
    $("#tabbar-div p span").click(function(){
        // 先去掉原选中状态
        $(".tab-front").removeClass("tab-front").addClass("tab-back");
        // 把当前按钮变成选中状态
        $(this).removeClass("tab-back").addClass("tab-front");
        // 当前是第几个按钮
        var i = $(this).index();
        // 先隐藏所有的div
        $(".tabbody-div").hide();
        // 显示相应的div
        $(".tabbody-div").eq(i).show();
    });
    //商品属性展示
    $('#type_id').change(function () {
        var type_id = $(this).val();
         if(type_id>0)
         {
            $.ajax({
                type : "GET",
                url  : "/index.php/Admin/Goods/ajaxGetAttrForm/type_id/"+type_id,
                success : function(data)
                {
                    $('#attrContent').find("tr:gt(0)").remove();
                    $('#attrContent').append(data);
                }
            });
         }
        else
         {
             $('#attrContent').find("tr:gt(0)").remove();
         }
    });

    //克隆
    function addANewAttRow(o)
    {
        // 先取出a标签所在的tr
        var tr = $(o).parent().parent();
        if($(o).html() == "[+]")
        {
            // 复制tr
            var newTr = tr.clone();
            newTr.find("a").html("[-]");
            tr.after(newTr);
        }
        else
            tr.remove();
    }

</script>