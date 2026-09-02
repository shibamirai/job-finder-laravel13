@props(['jobFinder', 'work' => null])

<div class="max-w-4xl mx-auto bg-white shadow-md rounded px-10 py-8 mb-4">
    <h1 class="text-xl text-cyan-500 text-center font-bold">成果物（ポートフォリオ）について</h1>

@isset($work)
    <form action="{{ route('works.update', [$jobFinder, $work]) }}" method="post" class="mt-4 space-y-4">
        @method('patch')
@else
    <form action="{{ route('works.store', $jobFinder) }}" method="POST" class="mt-4 space-y-4">
@endisset
        @csrf

        <!-- 作品の内容 -->
        <x-form.job-finder label="作品の内容" name="content">
            <input type="text" id="content" name="content"
                class="input"
                value="{{ old('content', optional($work)->content) }}"
                placeholder="旅行サイト、ポートフォリオサイトなど"
                required autofocus
            >
        </x-form.job-finder>

        <!-- 作品名 -->
        <x-form.job-finder label="作品名" name="title">
            <input type="text" id="title" name="title"
                class="input"
                value="{{ old('title', optional($work)->title) }}"
                placeholder="省略可"
            >
        </x-form.job-finder>

        <!-- URL -->
        <x-form.job-finder label="URL" name="url">
            <input type="text" id="url" name="url"
                class="input"
                value="{{ old('url', optional($work)->url) }}"
            >
        </x-form.job-finder>

        <!-- 使用言語 -->
        <x-form.job-finder label="使用言語" name="languages">
            <input type="text" id="languages" name="languages"
                class="input"
                value="{{ old('languages', optional($work)->languages) }}"
                placeholder="PHP、JAVAなど"
            >
        </x-form.job-finder>

        <!-- 制作期間 -->
        <x-form.job-finder label="制作期間" name="creation_time">
            <input type="number" id="creation_time" name="creation_time" min="0"
                class="input w-auto"
                value="{{ old('creation_time', optional($work)->creation_time) }}"
            > ヶ月
        </x-form.job-finder>

        <!-- 自由記入 -->
        <x-form.job-finder label="自由記入" name="description">
            <textarea id="description" name="description"
                class="textarea"
                placeholder="頑張った点など自由に記入してください"
            >{{ old('description', optional($work)->description) }}</textarea>
        </x-form.job-finder>

        <div class="mt-8 text-center">
@isset($work)
            <x-form.button class="rounded-full w-36">更新</x-form.button>
            <x-form.button class="rounded-full w-36" form="delete-form">削除</x-form.button>
@else
            <x-form.button class="rounded-full w-36">追加</x-form.button>
@endisset
        </div>
    </form>

@isset($work)
    <form id="delete-form" method="post" action="{{ route('works.destroy', [$jobFinder, $work]) }}">
        @method('delete')
        @csrf
    </form>
@endisset

</div>
