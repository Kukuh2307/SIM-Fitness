<div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        @csrf
        <div class="form-group">
            <label for="Nama_User">Nama User</label>
            <input type="text" class="form-control" id="Nama_User" wire:model.lazy="Nama_User" readonly>
            @error('Nama_User') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" wire:model.lazy="Email" readonly>
            @error('Email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="Total_Biaya">Total Biaya</label>
            <input type="text" class="form-control" id="Total_Biaya" wire:model.lazy="Total_Biaya" readonly>
            @error('Total_Biaya') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Bayar</button>
    </form>

    @if(!empty($response['snap_token']))
        <button id="pay-button">Bayar dengan Midtrans</button>
    @endif

    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $response['snap_token'] }}');
        };
    </script>
</div>
