<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;

use Illuminate\Support\Facades\Log;


class UsersExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $start;
    protected $end;

    function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    //Lấy ra các cột trong db để thêm vào cột trong excel của bảng users
    public function collection()
    {
        if (!empty($this->start) && !empty($this->end)) {
            $users = User::select('id', 'name', 'email', 'role', 'status', 'created_at', 'updated_at')
                ->orderByDesc('created_at')->whereBetween('created_at', [$this->start, $this->end])->get();
        } elseif (empty($this->start) && empty($this->end)) {
            $users = User::select('id', 'name', 'email', 'role', 'status', 'created_at', 'updated_at')
                ->orderByDesc('created_at')->get();
        } elseif (!empty($this->start) && empty($this->end)) {
            $users = User::select('id', 'name', 'email', 'role', 'status', 'created_at', 'updated_at')
                ->orderByDesc('created_at')->where('created_at', '>=', $this->start)->get();
        } elseif (empty($this->start) && !empty($this->end)) {
            $users = User::select('id', 'name', 'email', 'role', 'status', 'created_at', 'updated_at')
                ->orderByDesc('created_at')->where('created_at', '<=', $this->end)->get();
        }
        return $users;
    }

    //Thêm hàng tiêu đề cho bảng
    public function headings(): array
    {
        return ["STT", "Tên tài khoản", "Email", "Vai trò", "Trạng thái", "Ngày tạo", "Ngày cập nhật"];
    }

    // public function map($users): array
    // {
    //     return [
    //         $users->name,
    //         Date::dateTimeToExcel($users->created_at),
    //     ];
    // }

    // public function columnFormats(): array
    // {
    //     return [
    //         'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //     ];
    // }

    //Căn width của cột trong excel
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 30,
            'D' => 10,
            'E' => 10,
            'F' => 30,
            'G' => 20
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Styling a specific cell by coordinate.
            'B' => ['font' => ['bold' => true]],
        ];
    }

    //Đổ background cho cả file excel
    // public function backgroundColor()
    // {
    //     // Return RGB color code.
    //     return 'FFFF00';

    //     // Return a Color instance. The fill type will automatically be set to "solid"
    //     return new Color(Color::COLOR_YELLOW);

    //     // Or return the styles array
    //     return [
    //          'fillType'   => Fill::FILL_GRADIENT_LINEAR,
    //          'startColor' => ['argb' => Color::COLOR_RED],
    //     ];
    // }

    //Style cho cả file excel
    // public function defaultStyles(Style $defaultStyle)
    // {
    //     // Configure the default styles
    //     return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);

    //     // Or return the styles array
    //     return [
    //         'fill' => [
    //             // 'fillType'   => Fill::FILL_SOLID,
    //             'startColor' => ['argb' => Color::COLOR_BLACK],
    //         ],
    //     ];
    // }
}
