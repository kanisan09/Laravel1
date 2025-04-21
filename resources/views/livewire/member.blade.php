{{-- livewireは絶対１つのタグでかこむ！！！！ --}}

<div>
    @if ($message)
        <div style="background-color: #d4edda;
                    border: 1px solid #a7f7ba;
                    color: #155724;
                    padding: 0.75rem 1rem;
                    border-radius: 0.25rem;
                    position: relative;"
            role="alert">
            <strong class="font-bold">成功！</strong>
            <span class="block sm:inline">{{ $message }}</span>
            <button wire:click="$set('message', null)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>閉じる</title>
                    <path fill-rule="evenodd"
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.546l-2.651 3.303a1.2 1.2 0 0 1-1.697-1.697l3.303-2.651-3.303-2.651a1.2 1.2 0 0 1 1.697-1.697L10 8.546l2.651-3.303a1.2 1.2 0 0 1 1.697 1.697l-3.303 2.651 3.303 2.651a1.2 1.2 0 0 1 0 1.697z" />
                </svg>
            </button>
        </div>
    @endif

    @if ($error)
        <div style="background-color: #f8d7da; 
        border: 1px solid #f5c6cb;
        color: #721c24; 
        padding: 0.75rem 1rem;
        border-radius: 0.25rem;
        position: relative;"
            role="alert">
            <strong class="font-bold">エラー！</strong>
            <span class="block sm:inline">{{ $error }}</span>
            <button wire:click="$set('error', null)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>閉じる</title>
                    <path fill-rule="evenodd"
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.546l-2.651 3.303a1.2 1.2 0 0 1-1.697-1.697l3.303-2.651-3.303-2.651a1.2 1.2 0 0 1 1.697-1.697L10 8.546l2.651-3.303a1.2 1.2 0 0 1 1.697 1.697l-3.303 2.651 3.303 2.651a1.2 1.2 0 0 1 0 1.697z" />
                </svg>
            </button>
        </div>
    @endif

    {{-- 新規追加フォーム --}}
    @if (!$editingMemberId)
        <form wire:submit.prevent="save">
            <x-input wire:model="name" label="名前" />
            <x-button type="submit">保存</x-button>
        </form>
    @else
        {{-- 編集フォーム --}}
        <form wire:submit.prevent="updateMember">
            <x-input wire:model="name" label="名前" />
            <x-button type="submit">更新</x-button>
            <x-secondary-button wire:click="cancelEdit">キャンセル</x-secondary-button>
        </form>
    @endif

    <h2>メンバー一覧</h2>
    @foreach ($members as $member)
        <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
            <span>{{ $member->name }}</span>
            <div class="ml-auto">
                <x-secondary-button class="mr-2 secondary-button">編集</x-secondary-button>
                <x-danger-button wire:click="deleteMember({{ $member->id }})">削除</x-danger-button>
            </div>
        </div>
    @endforeach

    <style>
        body {
            font-size: 20px
        }

        .font-bold {
            font-weight: bold;
        }

        .block {
            display: block;
        }

        .sm\:inline {
            /* Tailwindの sm:inline は画面幅による切り替えなので、ここでは単純に inline にします */
            display: inline;
        }

        .fill-current {
            fill: currentColor;
        }

        .h-6 {
            height: 1.5rem;
            /* 24px相当 */
        }

        .w-6 {
            width: 1.5rem;
            /* 24px相当 */
        }

        .text-green-500 {
            color: #48bb78;
            /* Tailwindの text-green-500 相当 */
        }

        .text-red-500 {
            color: #e53e3e;
            /* Tailwindの text-red-500 相当 */
        }

        .secondary-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
            border-radius: 0.25rem;
        }

        .delete-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.5);
            border-radius: 0.25rem;
        }
    </style>

</div>
