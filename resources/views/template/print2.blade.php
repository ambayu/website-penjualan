
<style>
    * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Warung Makan</title>
    </head>
    <body>
        <div class="ticket">
            <p class="center"> <strong> 
                PATENXFATBOYFACTORY
                </strong> 
            </p>
            {{-- <img src="./logo.png" alt="Logo"> --}}
            <p class="centered">RECEIPT  
                <br>
                {{-- <br>Address line 1
                <br>Address line 2</p> --}}
                <br>ig: paten_x_fatboyfactory
            <br>
        https://pateenxfatboyfactory.com
        <br>
    <br> Alamat: Jalan D.l panjaitan Km.9 Tanjungpinang
    </p> 
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">Rp</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($menu as $trans )
                        <tr>
                            
                        <td class="quantity">{{$trans->jumlah  }}</td>
                        <td class="description">{{  $trans->menu->name }}</td>
                        <td class="price">{{ number_format($trans->menu->harga) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price">{{ number_format($total) }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                {{-- <br>parzibyte.me/blog</p> --}}
        </div>
        
    </body>
</html>
<script>
window.print();
</script>