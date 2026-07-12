<x-layout>
    <x-slot:title>Pembayaran - Meowland</x-slot>

    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white p-8 rounded-2xl shadow-sm ring-1 ring-secondary/10">
            <h1 class="font-serif text-3xl font-bold text-primary mb-6 border-t border-secondary/50 border-dashed pt-5">
                Detail Pembayaran</h1>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-sm uppercase tracking-wider text-secondary font-semibold mb-1">Tanggal Invoice</h3>
                    <p class="text-lg font-medium">{{ $date }}</p>
                </div>
                <div>
                    <h3 class="text-sm uppercase tracking-wider text-secondary font-semibold mb-1">Nomor Invoice</h3>
                    <p class="text-lg font-mono font-bold">{{ $invoiceNumber }}</p>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-primary mb-4 border-t border-secondary/50 border-dashed pt-5">Item
                    Transaksi</h2>
                <div class="bg-neutral rounded-xl p-4 shadow-sm overflow-hidden space-y-3">
                    @foreach ($products as $product)
                        @php $quantity = $cart[$product->id]; @endphp
                        <div class="flex justify-between items-center p-3 bg-white rounded-xl border border-black/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-lg bg-accent/10 flex items-center justify-center shrink-0">
                                    <span class="icon-[mdi--paw] text-xl text-accent"></span>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-primary">{{ $product->name }}</p>
                                    <p class="text-xs text-secondary">{{ $quantity }}x
                                        {{ $product->formatted_price }}</p>
                                </div>
                            </div>
                            <p class="font-bold text-sm text-primary">
                                {{ Number::currency($product->price * $quantity, in: 'IDR', locale: 'id', precision: 0) }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end mb-10 border-t border-secondary/50 border-dashed pt-5">
                <div class="text-right">
                    <h2 class="text-xl font-semibold text-secondary mb-1">Total Transaksi</h2>
                    <p class="text-4xl font-bold text-primary">{{ $formattedGrandTotal }}</p>
                </div>
            </div>

            <div class="bg-secondary/5 border border-secondary/20 rounded-2xl p-8 text-center mb-8">
                <h3 class="text-lg font-bold text-primary mb-4 uppercase">Metode Pembayaran:
                    {{ strtoupper($paymentMethod) }}</h3>

                @if ($paymentMethod === 'bayar ditempat')
                    <div class="flex flex-col items-center gap-4">
                        <div class="p-4 bg-white rounded-2xl shadow-sm inline-block">
                            <img src="https://quickchart.io/qr?text=https://www.youtube.com/watch?v=hvL1339luv0&list=RDhvL1339luv0&start_radio=1&size=200"
                                alt="QR Code" class="w-40 h-40">
                        </div>
                        <p class="text-lg text-secondary">Silakan tunjukkan <span class="font-bold text-primary">kode
                                ini</span> kepada kasir saat tiba di toko.</p>
                    </div>
                @else
                    <div class="flex flex-col items-center gap-4">
                        <div class="bg-white p-4 rounded-2xl shadow-sm ring-1 ring-secondary/20 inline-block">
                            <img src="https://quickchart.io/qr?text=https://www.youtube.com/watch?v=hvL1339luv0&list=RDhvL1339luv0&start_radio=1&size=200"
                                alt="QR Code" class="w-40 h-40">
                        </div>
                        <p class="text-sm text-secondary">Scan kode QR di atas untuk menyelesaikan pembayaran Anda.</p>
                    </div>
                @endif
            </div>

            <form action="{{ route('dashboard.user.payment.store') }}" method="POST"
                class="flex gap-4 justify-center border-t border-secondary/50 border-dashed pt-5 border-b pb-5">
                @csrf
                <input type="hidden" name="payment_method" value="{{ $paymentMethod }}">
                <a href="{{ route('dashboard.user.cart') }}"
                    class="px-8 py-3 rounded-xl font-bold text-secondary hover:bg-neutral transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-8 py-3 rounded-xl font-bold bg-primary text-white hover:opacity-90 transition hover:scale-105">
                    Konfirmasi Pembayaran
                </button>
            </form>
        </div>
    </div>
</x-layout>
