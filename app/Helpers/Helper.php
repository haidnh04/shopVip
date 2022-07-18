<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class Helper
{
    public static function convertDatetimeUpdate($timeAt)
    {
        if (!empty($timeAt)) return date_format($timeAt, 'd-m-Y');
        return '<p> </p>';
    }

    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                //Đoạn lấy danh mục cha
                $html .= '
                <tr>
                    <td>' . $menu->id . ' </td>
                    <td>' . $char . $menu->name . '  </td>
                    <td>' . self::active($menu->active) . ' </td>
                    <td>' . \App\Helpers\Helper::convertDatetimeUpdate($menu->created_at) . ' </td>
                    <td>' . \App\Helpers\Helper::convertDatetimeUpdate($menu->updated_at) . ' </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                        <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow(' . $menu->id . ', \'/admin/menus/destroy\')">
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                //Xóa menu tổng đang có cái key như trên (đệ quy)
                unset($menus[$key]);

                //Đoạn lấy danh mục con
                $html .= self::menu($menus, $menu->id, $char . '|--');
            }
        }

        return $html;
    }

    // public static function active($active = 0): string
    // {
    //     return $active == 0 ? '<span class="btn btn-danger btn-sm">NO</span>'
    //         : '<span class="btn btn-success btn-sm">YES</span>';
    // }

    // public static function menus($menus, $parent_id = 0)
    // {
    //     $html = '';
    //     foreach ($menus as $key => $menu) {
    //         if ($menu->parent_id == $parent_id) {
    //             $html .= '
    //             <li>
    //             <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
    //             ' . $menu->name . '
    //                 </a>';

    //             unset($menus[$key]);

    //             if (self::isChild($menus, $menu->id)) {
    //                 $html .= '<ul class="sub_menu">';
    //                 $html .= self::menus($menus, $menu->id);
    //                 $html .= '</ul>';
    //             }
    //             $html .= '</li>
    //             ';
    //         }
    //     }
    // }

    // public static function isChild($menus, $id)
    // {
    //     foreach ($menus as $menu) {
    //         if ($menu->parent_id == $id) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">Không</span>'
            : '<span class="btn btn-success btn-xs">Có</span>';
    }

    public static function menus($menus, $parent_id = 0): string
    {
        // $html = '';
        // foreach ($menus as $key => $menu) {
        //     if ($menu->parent_id == $parent_id) {
        //         $html .= '
        //             <li>
        //                 <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
        //                     ' . $menu->name . '
        //                 </a>';

        //         unset($menus[$key]);

        //         if (self::isChild($menus, $menu->id)) {
        //             $html .= '<ul class="sub-menu">';
        //             $html .= self::menus($menus, $menu->id);
        //             $html .= '</ul>';
        //         }

        //         $html .= '</li>';
        //     }
        // }

        // return $html;

        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>';

                unset($menus[$key]);

                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isParent($menus, $parent_id = 0): bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parent_id) {
                return true;
            }
        }

        return false;
    }

    public static function isChild($menus, $id): bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/lien-he.html" style="text-deconration:none; color:red;">Liên Hệ</a>';
    }

    public static function priceAdminProduct($price = 0)
    {
        if ($price != 0)  return number_format($price);
        return '<p>Chưa có giá</p>';
    }

    public static function salePriceAdminProduct($priceSale = 0)
    {
        if ($priceSale != 0)  return number_format($priceSale);
        return '<p>Chưa có giá sale</p>';
    }

    public static function amountProduct($amount = 0)
    {
        if ($amount != 0)  return number_format($amount);
        return '<p>Hết hàng</p>';
    }
}
