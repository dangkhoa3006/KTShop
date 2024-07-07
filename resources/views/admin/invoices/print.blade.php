<!DOCTYPE html>
<html>

<head>
    <title>Hóa đơn #{{ $order->code }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;

        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <h3 style="text-align: center; font-weight: bold;">KTMOBILE SHOP</h3>
        <span style="font-size: 13px;"><b>Địa chỉ: </b>65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.</span><br>
        <span style="font-size: 13px;"><b>Hotline: </b>0779 621 33</span><br>
        <span style="font-size: 13px;"><b>Website: </b>www.ktmobile.vn</span><br>
        <hr>
        <p><b>Mã đơn hàng: #{{ $order->code }}</b></p>
        <p><b>Tên khách hàng: </b> {{ $order->username }}</p>
        <p><b>Số điện thoại: </b> {{ $order->phone }}</p>
        <p><b>Địa chỉ nhận hàng: </b>
            @if (empty($order->address) && empty($order->ward_name) && empty($order->district_name) && empty($order->province_name))
                65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.
            @else
                @isset($order->address)
                    {{ $order->address }},
                @endisset
                @isset($order->ward_name)
                    {{ $order->ward_name }},
                @endisset
                @isset($order->district_name)
                    {{ $order->district_name }},
                @endisset
                @isset($order->province_name)
                    {{ $order->province_name }}.
                @endisset
            @endif
        </p>
        <table class="invoice-box">
            <tr class="heading" >
                <td>Sản phẩm</td>
                <td>Số lượng</td>
            </tr>
            @foreach ($order->details as $detail)
                <tr class="item">
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="2" style="font-size: 18px; text-align: right;"><b>TỔNG CỘNG:
                        <span style="margin-left: 20px;font-size: 19px;">
                            {{ number_format($order->total, 0, ',', '.') }} VND
                        </span></b>
                </td>
            </tr>
        </table>
        <p><b>Hình thức thanh toán: </b>
            @if ($order->payment_method == 'momo')
                MoMo QR
            @elseif ($order->payment_method == 'cash_money')
                Tiền mặt
            @elseif ($order->payment_method == 'vnpay')
                Chuyển khoản VNPay
            @elseif ($order->payment_method == 'banking_transfer')
                Chuyển khoản ngân hàng
            @else
                *Chưa thanh toán*
            @endif
        </p>
        <p><b>Tình trạng: </b>
            @if ($order->status == 0)
                Chưa thanh toán
            @elseif ($order->status == 1)
                Đã thanh toán
            @elseif ($order->status == 2)
                Chờ xác nhận
            @elseif ($order->status == 3)
                Đã xác nhận
            @endif
        </p>
    </div>
</body>

</html>
