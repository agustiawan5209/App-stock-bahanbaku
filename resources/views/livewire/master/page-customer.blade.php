<div class="animate__animated animate__fadeIn">
    <div  id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

<div class="w-full overflow-hidden">
    <div class=" w-full overflow-x-auto">

        <table id="Customer" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th class="px-2 py-2">No</th>
                    <th class="px-2 py-2">supplier</th>
                    <th class="px-2 py-2">Nomor Telepon</th>
                    <th class="px-2 py-2">Alamat</th>
                    {{-- <th data-priority="5">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->customer }}</td>
                        <td>{{ $item->user->phone }}</td>
                        <td>{{ $item->user->alamat }}</td>
                        {{-- <td>{{ $item->price }}</td> --}}
                        {{-- <td>
                            <ul class="flex justify-around">
                                @include('components.action.delete', ['value' => $item->id])
                               @include('components.action.edit', ['value' => $item->id , 'table'=> $item])
                            </ul>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    var table = $('#Customer').DataTable({

                })
                .columns.adjust()
                .responsive.recalc();
</script>
