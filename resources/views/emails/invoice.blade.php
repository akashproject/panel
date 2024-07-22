<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        div {
            margin: 13px 0;
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
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            text-align: center;
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .billing-details{
            padding: 0 20px;
            width: 25%;
            float: right;
        }
        .billing-details {
            padding: 0 20px;
            width: 100%;
            float: right;
        }
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body data-new-gr-c-s-check-loaded="14.1187.0" data-gr-ext-installed="">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr class="top">
                    <td colspan="5">
                        <table>
                            <tbody><tr>
                                <td class="title">
                                    <img src="https://devsov.baazar.live/panel/assets/administrator/img/logo.png" style="width: 100%; max-width: 300px;">
                                </td>
                                <td style="text-align: right;">
                                    Invoice #: {{ $order_no }}<br>
                                    Purchesed Date: {{ date("d M, Y",strtotime($date))}}<br>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="5">
                        <table>
                            <tbody><tr>
                            <td>
                                    <div> <Strong> Bill From</Strong> </div>
                                    Baazar Live Ptv LTD.<br>
                                    sales@baazar.live<br>
                                    9836550022<br>
                                    GSTIN : 9658744477. 
                                </td>
                                <td style="text-align: right;">
                                    <div> <Strong> Bill To</Strong> </div>
                                    {{ $name }}<br>
                                    {{ $email }}<br>
                                    {{ $mobile }}<br>
                                    {{ $address }}, {{ $state }}, {{ $pincode }}
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="5" style="border: 1px solid;text-align: center;">
                        <h1 style="font-size: 18px;padding: 15px;background: #043a3a;color: #fff;margin: 0;"> Congratulation! Session has been Purchesed successfully </h1>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Sl No.</td>
                    <td>Item</td>
                    <td>Session Fee</td>
                    <td>Platform Fee</td>
                    <td>Total Fee</td>
                </tr>
                @foreach($orderItem as $key => $item)
                <tr class="item">
                    <td>{{$key+1}}.</td>
                    <td> {{ number_format($item->batch_id) }}</td>
                    <td>₹{{ number_format($item->teacher_fee) }}/-</td>
                    <td>₹{{ number_format($item->platform_fee) }}/-</td>
                    <td>₹{{ number_format($item->price) }}-</td>
                </tr>
                @endforeach
                <tr class="">
                    <td colspan="5">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        Session Fee:
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{ number_format($session_price) }}/-</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Platform Fee
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{ number_format($plaform_fee) }}/-</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Discount :
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>{{ $code }}: ₹{{number_format($discount)}}/-</strong>
                                    </td>
                                </tr>
                                @if(isset($state) && $state == "WB")
                                <tr>
                                    <td>
                                        CGST 9%:
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{number_format($tax/2)}}/-</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        SGST 9%:
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{number_format($tax/2)}}/-</strong>
                                    </td>
                                </tr>
                                @else 
                                <tr>
                                    <td>
                                        IGST 18%:
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{number_format($tax)}}/-</strong>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>
                                        Total:
                                    </td>
                                    <td style="padding-right: 17px;text-align: right;">
                                        <strong>₹{{ number_format($amount) }}/-</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="text-align:center">
        All Copyright Reserved @ baazar.live
    </div>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'},{'ap':'cpbh-mt'},{'server':'sg2plmcpnl492411'},{'dcenter':'sg2'},{'cp_id':'9971102'},{'cp_cl':'8'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src="https://img1.wsimg.com/traffic-assets/js/tccl.min.js"></script>
</body>
</html>