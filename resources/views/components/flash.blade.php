@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 10000)"
         x-show="show"
         class="fixed shadow bg-cyan-500 text-white py-2 px-8 rounded-full bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
