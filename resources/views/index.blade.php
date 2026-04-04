<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Item PBL</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Daftar Item Proyek PBL</h1>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['stok'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
