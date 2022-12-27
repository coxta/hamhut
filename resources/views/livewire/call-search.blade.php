<div>
    <div class="bg-white rounded overflow-hidden shadow px-4 py-4">

        <h1>Contact Log</h1>

        <div class="mt-4">
            <div class="mt-1">
                <input wire:model.lazy="sign" type="text" name="call" id="call" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="callsign">
            </div>
        </div>

    </div>

    @if($ham)

        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $ham['current']['callsign'] }}
            </h3>
            <div class="mt-2 max-w-xl text-sm text-gray-500">
                <p>
                {{ $ham['name'] }}
                </p>
                <p>
                {{ $ham['address']['line2'] }}
                </p>
            </div>
            <div class="mt-5">
                <button wire:click="contact" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                    Made Contact
                </button>
            </div>
        </div>

    </div>
    @endif

    @if($sign && !$ham)
    <div class="bg-white rounded overflow-hidden shadow px-4 py-4 mt-4">
        <p>No results for "<strong>{{ $sign }}</strong>"</p>
    </div>
    @endif

</div>
