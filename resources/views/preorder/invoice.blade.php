<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            overflow: hidden;
        }

        #invoice-template {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #777;
        }

        #invoice-template h1 {
            font-weight: 900;
            color: #000;
        }

        #invoice-template a {
            color: #06f;
        }

        #invoice-template .invoice-box {
            position: relative;
            width: 600px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 20px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            page-break-inside: avoid;
        }

        #invoice-template .invoice-box .logo-background {
            position: absolute;
            width: 100%;
            height: 50%;
            opacity: 0.1;
            /* background: url('assets/img/logo.png'); */
            transform: translate(28%, 38%);
            background-repeat: no-repeat;
            z-index: 1;
        }

        #invoice-template .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        #invoice-template .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        #invoice-template .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        #invoice-template .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        #invoice-template .invoice-box table tr.information table td {
            padding-bottom: 20px;
        }

        #invoice-template .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        #invoice-template .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        #invoice-template .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        #invoice-template .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        #invoice-template .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>

<body>
    <section id="invoice-template">
        <div class="invoice-box">
            <div class="logo-background"></div>
            <table>
                <tr class="top">
                    <td colspan="3">
                        <table>
                            <tr>
                                <td>
                                    <img src="{{public_path('assets/img/logo.png')}}" alt="" width="100" height="100">
                                </td>
                                <td class="title" colspan="2" align="center" style="line-height: 5px">
                                    <h1>Meikhashop</h1><br>
                                    <b>{{$po->tracknum}}</b> | Tanggal PO: {{$po->datetime}}
                                    <p>No Resi : </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>Penerima</td>
                    <td colspan="2">{{$cust->name}}({{$cust->phone}})</td>
                </tr>
                <tr class="details item">
                    <td>Alamat</td>
                    <td colspan="2">{{$cust->address}}</td>
                </tr>
                <tr class="heading">
                    <td>Pengirim</td>
                    <td colspan="2">Meikha Shop(083820897779)</td>
                </tr>
                <tr class="details item">
                    <td>Alamat</td>
                    <td colspan="2">Majalaya, Kabupaten Bandung, Jawa Barat 40382</td>
                </tr>
            </table>
            <h5 style="text-align: center">Terima kasih telah melakukan transaksi dengan kami</h5>
        </div>
    </section>
</body>

</html>