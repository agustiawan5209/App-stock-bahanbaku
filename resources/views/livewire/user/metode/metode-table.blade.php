<div class="container">
    <div class="mt-10 sm:mt-0">
        <h4 class="mb-4 text-lg font-semibold text-gray-600   ">
            {{ __('Metode Pembayaran') }}
        </h4>
        <x-button type="button" class="mb-4 text-lg font-semibold text-white" wire:click='CreateModal'>
            {{ __('Tambah Metode Pembayaran') }}
        </x-button>
        @if (session()->has('message'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-1/2" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ session('message') }}</p>
        </div>
    @endif
        @if ($itemEdit)
            @include('livewire.user.metode.edit')
        @endif

        @if ($itemDelete)
            @include('livewire.user.metode.delete')
        @endif

        @if ($itemCreate)
            @include('livewire.user.metode.edit')
        @endif

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table id="MetodeTable" class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50      ">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Name Card</th>
                            <th class="px-4 py-3">Number Card</th>
                            <th class="px-4 py-3">Metode</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y     ">
                        @foreach ($payment as $payments)
                            <tr class="text-gray-700   ">
                                <td class="px-4 py-3">
                                    1
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$payments->name_card}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$payments->number_rek}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$payments->metode}}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button  wire:click='EditModal({{$payments->id}})'
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg    focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button wire:click='deleteModal({{$payments->id}})'
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg    focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
     var table = $('#MetodeTable').DataTable({

                })
                .columns.adjust()
                .responsive.recalc();
</script>
