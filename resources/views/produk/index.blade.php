<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-200">Produk</h3>
                    <span class="text-sm">Semua data produk, Klik pada menu detail untuk melihat detail</span>
                </div>

                {{-- button create --}}
                <div class="mt-4 px-6">
                    <a href="{{route('kategori.create')}}" class="text-md font-semibold text-red-500 hover:text-red-300">Tambah Kategori</a>
                </div>

                {{-- Table Kategori --}}
                <div class="overflow-x-auto px-6 py-6">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead class="bg-red-500 text-white">
                            <th class="py-1 px-4 uppercase text-sm">Nama Produk</th>
                            <th class="py-1 px-4 uppercase text-sm">Harga</th>
                            <th class="py-1 px-4 uppercase text-sm">Kategori</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="py-1 px-4 dark:text-gray-200"> <a href="" class="font-semibold text-red-600">{{$item->nama_produk}}</a></td>
                                    <td class="py-1 px-4 dark:text-gray-200">IDR.{{number_format($item->harga)}}</td>
                                    <td class="py-1 px-4 dark:text-gray-200">{{$item->kategori->nama_kategori}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>