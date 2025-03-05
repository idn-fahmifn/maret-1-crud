<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">{{$data->nama_produk}}</h3>
                    <span class="text-sm">Detail produk {{$data->nama_produk}}</span>
                </div>
                <div class="overflow-x-auto mb-6 px-6">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <tbody>
                            <tr>
                                <th class="text-start dark:text-gray-200">Nama Produk</th>
                                <td class="dark:text-gray-200">{{$data->nama_produk}}</td>
                                <td rowspan="4">
                                    <img src="{{asset('storage/images/produk/' . $data->thumbnail)}}" width="200"
                                        alt="Gambar Produk">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start dark:text-gray-200">Harga</th>
                                <td class="dark:text-gray-200">IDR. {{number_format($data->harga)}}</td>
                            </tr>
                            <tr>
                                <th class="text-start dark:text-gray-200">Kategori</th>
                                <td class="dark:text-gray-200">{{$data->kategori->nama_kategori}}</td>
                            </tr>
                            <tr>
                                <th class="text-start dark:text-gray-200">Deskripsi</th>
                                <td class="dark:text-gray-200">{{$data->deskripsi}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">Edit Kategori
                        {{$data->nama_produk}}
                    </h3>
                </div>
                <div class="mb-6 px-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Nama Produk</label>
                            <input type="text" name="nama_produk" required value="{{$data->nama_produk}}"
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Ketegori Produk</label>
                            <select name="id_kategori" required
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                                <option value="{{$data->id_kategori}}">-{{$data->kategori->nama_kategori}}-</option>
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Harga</label>
                            <input type="number" name="harga" required value="{{$data->harga}}"
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Deskripsi</label>
                            <textarea name="deskripsi" required
                                class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                                {{$data->deskripsi}}
                            </textarea>
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