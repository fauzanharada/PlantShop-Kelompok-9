<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: 750px;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 740px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }

    </style>
</head>

<body>
    <div class="container">
        <table>
            <caption>
                Plant Shop BJM
            </caption>
            <thead>
                <tr>
                    <th colspan="4">No. Pesanan <strong>#{{ $pesanan[0]->uuid_pesan }}</strong></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>PlantShop BJM.<br>
                            Banjarmasin, Kalimantan Selatan<br>
                            081250829960<br>
                            plantshop@gmail.com
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Pelanggan: </h4>
                        <p>{{ $biodata->nama_lengkap }}<br>
                            {{ $biodata->alamat_lengkap }}<br>
                            {{ $biodata->no_hp }}<br>
                            {{ $biodata->email }} <br>

                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">Produk</th>
                    <th colspan="2">Harga</th>
                </tr>
                @php
                $total = 0;
                $ongkir = 41000;
                @endphp
                @foreach ($pesanan as $row)
                    <tr>
                        <td colspan="2">{{ $row->produk->nama_produk }}</td>
                        <td colspan="2">{{ 'Rp. ' . format_uang($row->produk->harga_produk) }}
                        </td>
                    </tr>
                    @php
                    $total = $row->produk->harga_produk + $total;
                    @endphp
                @endforeach
                <tr>
                    <th colspan="2"> Ongkos Kirim</th>
                    <td colspan="2">{{ 'Rp. ' . format_uang(41000) }}</td>
                </tr>
                <tr>
                    @php
                    $total = $total + $ongkir
                    @endphp
                    <th colspan="2">Subtotal</th>
                    <td colspan="2"> {{ 'Rp. ' . format_uang($total) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</body>

</html>
