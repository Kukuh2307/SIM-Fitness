<div>
    <form wire:submit.prevent="resetPassword">
        @csrf
        <input type="hidden" wire:model="token">
        <input type="email" wire:model="email" required placeholder="Email">
        <input type="password" wire:model="password" required placeholder="New Password">
        <input type="password" wire:model="password_confirmation" required placeholder="Confirm Password">
        <button type="submit">Reset Password</button>
    </form>
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
