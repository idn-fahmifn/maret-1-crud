<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">{{$data->nama_kategori}}</h3>
                    <span class="text-sm">Detail kategori {{$data->nama_kategori}}</span>
                </div>
                <div class="overflow-x-auto mb-6 px-6">



                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <tbody>
                            <tr>
                                <td class="dark:text-white">{{$data->nama_kategori}}</td>
                                <td>
                                    <img src="{{asset('storage/images/kategori/' . $data->thumbnail)}}" width="100"
                                        alt="Gambar Kategori">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- list data produk --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">Produk yang ada pada kategori
                        {{$data->nama_kategori}}</h3>
                </div>

                <div class="overflow-x-auto mb-12">

                    @if (!$produk)
                        <span class="mx-6 text-gray-200">
                            Belum ada produk pada kategori ini.
                        </span>
                    @else
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <th class="py-2 px-2 text-start uppercase font-semibold dark:text-gray-200">Nama Produk</th>
                                <th class="py-2 px-2 text-start uppercase font-semibold dark:text-gray-200">Harga</th>
                            </thead>
                            <tbody>
                                @foreach ($data->produk as $item)
                                    <tr>
                                        <td class="py-2 px-2 font-md dark:text-gray-200">{{$item->nama_produk}}</td>
                                        <td class="py-2 px-2 font-md dark:text-gray-200">IDR. {{number_format($item->harga)}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">Edit Kategori
                        {{$data->nama_kategori}}
                    </h3>
                </div>
                <div class="mb-6 px-6">
                    <form action="{{route('kategori.update', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Nama Kategori</label>
                            <input type="text" name="nama_kategori" value="{{$data->nama_kategori}}" required
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Thumbnail</label>
                            <input type="file" name="thumbnail" value="{{$data->thumbnail}}"
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-300 text-white rounded-md px-6 py-2">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>