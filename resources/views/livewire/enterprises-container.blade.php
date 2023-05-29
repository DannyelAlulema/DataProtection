<div>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('enterprise-saved-message'))
                <div class="bg-indigo-500 border border-indigo-400 text-white px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('enterprise-saved-message') }}</span>
                </div>
                @php session()->forget([ 'enterprise-saved-message', 'type' ]); @endphp
            @endif

            @if (count($enterprises) == 0)
                <button wire:click.defer="addEnterprise"
                    class="inline-flex items-center px-1 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                    <i class="fa-solid fa-plus"></i>
                </button>
            @endif

            @foreach ($enterprises as $enterprise)
                @livewire('enterprise-card', ['enterpriseId' => $enterprise['id'], 'paid' => $enterprise['paid']])
            @endforeach
        </div>
    </div>
</div>
