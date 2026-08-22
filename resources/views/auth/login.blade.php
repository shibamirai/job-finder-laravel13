<x-layout.auth>
    <form method="post" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <x-form.field name="email" label="メールアドレス" type="email" autocomplete="off" />
        <x-form.field name="password" label="パスワード" type="password" />

        <div class="text-end">
            <x-form.button class="rounded-md">ログイン</x-form.button> 
        </div>
    </form>
</x-layout.auth>
