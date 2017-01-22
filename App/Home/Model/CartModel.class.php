<?php
/**
 * 购物车
 * User: 钟贵廷
 * Date: 2017/1/22
 * Time: 15:15
 */

namespace Home\Model;
use Think\Model;

class CartModel extends Model
{
    // 加入购物车
    public function addToCart($goods_id, $goods_number, $goods_attr)
    {
        $mid = session('mid');
        // 1. 先判断用户有没有登录
        if($mid)
        {
            // 先判断购物车中有没有这件商品
            $info = $this->where("goods_id=$goods_id AND goods_attr='$goods_attr' AND member_id=$mid")->find();
            if($info)
            {
                // 修改商品数量
                $this->goods_number = $info['goods_number'] + $goods_number;
                return $this->save();
            }
            else
            {
                return $this->add(array(
                    'member_id' => $mid,
                    'goods_id' => $goods_id,
                    'goods_number' => $goods_number,
                    'goods_attr' => $goods_attr,
                ));
            }
        }
        else
        {
            // 没登录
            // 1. 先从COOKIE中取出购物车的数组
            $cart = cookie('Cart');
            // 2. 反序列化成数组
            $cart = $cart ? unserialize($cart) : array();
            // 3. 判断如果商品已经存在就只加商品的数量，如果商品不存在就添加新的商品
            $_key = $goods_id . '-'. $goods_attr;
            $cart[$_key] += $goods_number;
            // 4. 存回到COOKIE，保存一个月
            cookie('Cart', serialize($cart), 'expire='.(30*86400));
            return TRUE;
        }
    }


    // 获取购物车中所有的商品
    public function get($idOnly = FALSE)
    {
        /********* 购物车中商品的ID ************/
        $mid = session('mid');
        // 1. 先判断用户有没有登录
        if($mid)
        {
            $cart = $this->where('member_id='.$mid)->select();
        }
        else
        {
            // 没登录
            // 1. 先从COOKIE中取出购物车的数组
            $cart = cookie('Cart');
            // 2. 反序列化成数组
            $cart = $cart ? unserialize($cart) : array();
            // 重新处理一个数组和格式
            if($cart)
            {
                $_cart = array();
                foreach ($cart as $k => $v)
                {
                    $_k = explode('-', $k);
                    $_cart[] = array(
                        'goods_id' => $_k[0],
                        'goods_attr' => $_k[1],
                        'goods_number' => $v,
                        'member_id'=>0,
                    );
                }
                $cart = $_cart;
            }
        }
        if($idOnly)
            return $cart;
        /**************** 取出商品的详细信息 *****************/


        // 先取出每件商品的详细的信息
        if($cart)
        {
            $_goods = array();
            $goodsModel = D('Goods');
            // 循环每一件商品取出详细的信息
            foreach ($cart as $k => $v)
            {
                // 根据商品ID取出详细信息
//                $info = $goodsModel->getInfoWidthMemberPrice($v['goods_id'], 'a.sm_logo,a.goods_name,a.shop_price,a.weight,a.weight_unit');
                $info = $goodsModel->find($v['goods_id']);
                // 根据商品属性的ID算出属性的字符串
                if($v['goods_attr'])
                {
                    $sql = "SELECT GROUP_CONCAT(CONCAT(b.attr_name,':',a.attr_value) SEPARATOR '<br />') goods_attr_str FROM ".C('DB_PREFIX')."goods_attr a LEFT JOIN ".C('DB_PREFIX')."attribute b ON a.attr_id=b.id WHERE a.id IN({$v['goods_attr']});";
                    $_gas = $this->query($sql);
                    $_goods_attr_str = $_gas[0]['goods_attr_str'];
                }
                else
                {
                    $_goods_attr_str = '';
                }
                $_goods[] = array(
                    'goods_id' => $v['goods_id'],
                    'sm_logo' => $info['sm_logo'],
                    'goods_name' => $info['goods_name'],
                    'goods_attr_id' => $v['goods_attr'],
                    'goods_attr_str' => $_goods_attr_str,
//                    'mprice' => $info['mprice'],
                    'goods_number' => $v['goods_number'],
                    'shop_price' => $info['shop_price'],
                    'weight' => $info['weight'],
                    'weight_unit' => $info['weight_unit'],
                );
            }
            return $_goods;
        }
    }
}