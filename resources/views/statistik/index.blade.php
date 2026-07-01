@extends('layouts.app')
@section('title', 'Statistik')
@section('content')

{{-- KARTU RINGKASAN --}}
<h2 style="color:#1E3A5F;margin-bottom:20px">Statistik Toko Elektronik</h2>

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:28px">
    <div style="background:#1E3A5F;color:#fff;border-radius:10px;padding:20px;text-align:center">
        <div style="font-size:36px;font-weight:700">{{ $totalProduk }}</div>
        <div style="font-size:14px;margin-top:6px;opacity:.8">Total Produk</div>
    </div>
    <div style="background:#27AE60;color:#fff;border-radius:10px;padding:20px;text-align:center">
        <div style="font-size:36px;font-weight:700">{{ $totalKategori }}</div>
        <div style="font-size:14px;margin-top:6px;opacity:.8">Total Kategori</div>
    </div>
    <div style="background:#E6A817;color:#fff;border-radius:10px;padding:20px;text-align:center">
        <div style="font-size:36px;font-weight:700">{{ $totalStok }}</div>
        <div style="font-size:14px;margin-top:6px;opacity:.8">Total Stok</div>
    </div>
</div>

{{-- GRAFIK --}}
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">

    {{-- Bar Chart --}}
    <div style="background:#fff;border-radius:10px;padding:20px;box-shadow:0 1px 4px rgba(0,0,0,.08)">
        <h3 style="color:#1E3A5F;margin-bottom:16px;font-size:15px">Jumlah Produk per Kategori</h3>
        <canvas id="barChart"></canvas>
    </div>

    {{-- Pie Chart --}}
    <div style="background:#fff;border-radius:10px;padding:20px;box-shadow:0 1px 4px rgba(0,0,0,.08)">
        <h3 style="color:#1E3A5F;margin-bottom:16px;font-size:15px">Persentase Stok per Kategori</h3>
        <canvas id="pieChart"></canvas>
    </div>

</div>

{{-- Tabel Ringkasan --}}
<div style="background:#fff;border-radius:10px;padding:20px;box-shadow:0 1px 4px rgba(0,0,0,.08);margin-top:20px">
    <h3 style="color:#1E3A5F;margin-bottom:16px;font-size:15px">Detail per Kategori</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Jumlah Produk</th>
                <th>Total Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokPerKategori as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['total'] }} produk</td>
                <td>{{ $item['stok'] }} unit</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($stokPerKategori->pluck('nama'));
    const jumlahProduk = @json($stokPerKategori->pluck('total'));
    const jumlahStok = @json($stokPerKategori->pluck('stok'));

    const colors = [
        '#1E3A5F','#27AE60','#E6A817','#C0392B',
        '#8E44AD','#16A085','#D4580A','#2E86C1'
    ];

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Produk',
                data: jumlahProduk,
                backgroundColor: colors,
                borderRadius: 6,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });

    // Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: jumlahStok,
                backgroundColor: colors,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>

@endsection