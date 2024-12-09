{{-- resources/views/transaksis/payment.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
</head>
<body>
    <h1>Silakan Lanjutkan Pembayaran</h1>
    <button id="pay-button">Bayar Sekarang</button>

    <!-- Script Snap.js dari Midtrans -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        var snapToken = "{{ $snapToken }}"; // Ambil token dari controller

        document.getElementById('pay-button').onclick = function () {
            snap.pay(snapToken, {
                onSuccess: function(result) {
                    alert("Pembayaran Berhasil!");
                    console.log(result);
                    window.location.href = "{{ route('transaksis.index') }}";
                },
                onPending: function(result) {
                    alert("Pembayaran Tertunda!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Pembayaran Gagal!");
                    console.log(result);
                },
            });
        };
    </script>
</body>
</html>
