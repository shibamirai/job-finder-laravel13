<x-layout>
    <x-slot name="header">
        職種編集
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded px-10 py-8 overflow-auto"
        x-data="{
            open: false,
            action: '',
            name: '',
            is_it: false,
        }"
    >
        <div class="border-b border-gray-300 flex justify-end pb-5">
            <x-form.button
                class="rounded-md text-sm"
                @click="
                    open = true;
                    action = '';
                    name = '';
                    is_it = false;
                "
            >追加</x-form.button>
        </div>

        <table class="w-full text-left">
            <thead class="text-cyan-500">
                <tr class="border-b-2 border-gray-300">
                    <th class="px-3 py-3">職種</th>
                    <th class="w-20 py-3 text-center">IT系</th>
                    <th class="w-20 py-3 text-center"></th>
                </tr>
            </thead>

            <tbody>
@foreach ($occupations as $occupation)
                <tr class="border-b border-gray-300">
                    <td class="px-3 py-3">
                        <div>{{ $occupation->name }}</div>
                    </td>
                    <td class="py-3 text-center">
@if ($occupation->is_it)
                        <span class="border border-cyan-500 rounded-full bg-cyan-500 px-4 py-1 text-sm text-white">IT系</span>
@endif
                    </td>
                    <td class="py-3 flex gap-2 justify-center text-sm">
                        <!-- その職種での就職者がだれもいない場合のみ削除可能とする -->
                        <button
                            @click="
                                open = true;
                                action = '{{ route('occupations.update', $occupation->id) }}';
                                name = '{{ $occupation->name }}';
                                is_it = @if ($occupation->is_it) true @else false @endif;
                            "
                            class="font-medium text-cyan-500 hover:text-cyan-700"
                        >編集</button>
@if ($occupation->workers_count == 0)
                        <form x-data
                            @submit.prevent="if (window.confirm('{{ $occupation->name }}を削除しますか？')) { $el.submit() }"
                            action="{{ route('occupations.destroy', $occupation->id) }}"
                            method="post"
                        >
                            @method('delete')
                            @csrf
                            <button
                                class="font-medium text-gray-500 hover:text-gray-700"
                            >削除</button>
                        </form>
@else
                        <span class="text-gray-400 line-through">削除</span>
@endif
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>

        <div x-cloak
            x-show="open"
            x-transition.opacity.duration.200ms
            @keydown.esc.window="open = false"
            @click.self="open = false"
            class="fixed inset-0 z-30 flex justify-center bg-black/20 backdrop-blur-md items-center"
            role="dialog"
            aria-modal="true"
            aria-labelledby="defaultModalTitle"
        >
            <!-- Modal Dialog -->
            <div x-show="open"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50"
                x-transition:enter-end="opacity-100 scale-100"
                class="flex w-lg flex-col overflow-hidden bg-white"
            >
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b border-gray-300 p-4">
                    <h3 id="defaultModalTitle" class="font-semibold tracking-wide">
                        職種
                    </h3>
                    <button x-on:click="open = false" aria-label="close modal">
                        <x-icons.close />
                    </button>
                </div>
                <!-- Dialog Body -->
                <form method="post" :action="action || '{{ route('occupations.store') }}'" class="m-4 space-y-4">
                    <template x-if="action">
                        @method("patch")
                    </template>
                    @csrf

                    <div><input name="name" class="input" x-model="name" placeholder="職種名称" ></div>
                    <div>
                        <label class="font-normal">
                            <input type="checkbox" class="checkbox" name="is_it" x-model="is_it">
                            <span class="ml-1 mr-4">IT系の職種であればチェック</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <template x-if="action">
                            <x-form.button class="rounded-md">更新</x-form.button>
                        </template>
                        <template x-if="!action">
                            <x-form.button class="rounded-md">追加</x-form.button>
                        </template>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
