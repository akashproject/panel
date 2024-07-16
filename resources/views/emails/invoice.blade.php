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
            border-bottom: 1px solid #ccc;
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
                                <td>
                                    Invoice #: 123<br>
                                    Purchesed Date: January 1, 2024<br>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="5" style="border: 1px solid;">
                        <table>
                            <tbody><tr>
                                <td>
                                    <div> <Strong> Bill From</Strong> </div>
                                    Baazar Live Ptv LTD.<br>
                                    sales@baazar.live<br>
                                    9836550022<br>
                                    GSTIN : 9658744477. 
                                </td>
                                <td>
                                    <div> <Strong> Bill To</Strong> </div>
                                    Akash Dutta<br>
                                    akashduttaphp@gmail.com<br>
                                    9685478877<br>
                                    Bhattanagar, Liluah, Howrah 711203
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Sl No.</td>
                    <td>Item</td>
                    <td>Session Fee</td>
                    <td>Platform Fee</td>
                    <td>Total Fee</td>
                </tr>
                <tr class="item">
                    <td>1.</td>
                    <td>Live Intraday Treding Session</td>
                    <td>₹100.00/-</td>
                    <td>₹100.00/-</td>
                    <td>₹200.00/-</td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;"> Session Fee: </span>
                            <span style="float: right;"><strong>₹200/-</strong></span>
                        </div>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;"> Platform Fee : </span>
                            <span style="float: right;"><strong>₹200/-</strong></span>
                        </div>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;"> Discount : </span>
                            <span style="float: right;"><strong>₹100/-</strong></span>
                        </div>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;"> CGST 9%: </span>
                            <span style="float: right;"><strong>₹9.00/-</strong></span>
                        </div>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;"> SGST 9%: </span>
                            <span style="float: right;"><strong>₹9.00/-</strong></span>
                        </div>
                        <div style="display: block;overflow: hidden;">
                            <span style="float: left;">Total:</span>
                            <span style="float: right;"> <strong>₹385.00/-</strong></span>
                        </div>
                        
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
