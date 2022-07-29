<?php

namespace App\Exports;

use App\Models\Cart;
use App\Models\Customer;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartsExport implements FromCollection, WithHeadings, WithColumnWidths, WithColumnFormatting
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
            $customer = DB::table('customers')
                ->join('carts', 'customers.id', '=', 'carts.customer_id')
                ->select('customers.*', 'carts.price')
                ->orderByDesc('customers.created_at')
                ->whereBetween('customers.created_at', [$this->start, $this->end])
                ->get();
        } elseif (empty($this->start) && empty($this->end)) {
            $customer = DB::table('customers')
                ->join('carts', 'customers.id', '=', 'carts.customer_id')
                ->select('customers.*', 'carts.price')
                ->orderByDesc('customers.created_at')
                ->get();
        } elseif (!empty($this->start) && empty($this->end)) {
            $customer = DB::table('customers')
                ->join('carts', 'customers.id', '=', 'carts.customer_id')
                ->select('customers.*', 'carts.price')
                ->orderByDesc('customers.created_at')
                ->where('customers.created_at', '>=', $this->start)
                ->get();
        } elseif (empty($this->start) && !empty($this->end)) {
            $customer = DB::table('customers')
                ->join('carts', 'customers.id', '=', 'carts.customer_id')
                ->select('customers.*', 'carts.price')
                ->orderByDesc('customers.created_at')
                ->where('customers.created_at', '<=', $this->end)
                ->get();
        }
        return $customer;
    }

    public function columnFormats(): array
    {
        return [
            // 'I' => '[$€-2] * #,##0.00;-[$€-2] * #,##0.00_-;_-[$€-2] * "-"??_-;_-@_-',
            'I' => '### 000',
        ];
    }

    //Thêm hàng tiêu đề cho bảng
    public function headings(): array
    {
        return ["STT", "Tên khách", "Số điện thoại", "Địa chỉ", "Email", "Ghi chú", "Ngày tạo đơn", "Ngày cập nhật", "Giá trị đơn hàng"];
    }

    //Căn width của cột trong excel
    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 20,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 26,
            'H' => 26,
            'I' => 15
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Styling a specific cell by coordinate.
            'B' => ['font' => ['bold' => true]],
        ];
    }
}
