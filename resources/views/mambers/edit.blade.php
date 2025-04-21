@foreach($members as $members)
<div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
    <span>{{ $member->name }}</span>
    <div class="ml-auto">
        <a href="{{ route('members.edit', $member->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-2 secondary-button">
            編集
        </a>
        <x-danger-button wire:click=
    </div>

</div>