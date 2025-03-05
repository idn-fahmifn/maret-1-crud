<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200">Tambah Produk</h3>
                    <span class="text-sm">Form menambahkan produk</span>
                </div>

                <div class="mb-6 px-6">
                    <form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Nama Produk</label>
                            <input type="text" name="nama_produk" required class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Ketegori Produk</label>
                            <select name="id_kategori" required class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                                <option value="">-Pilih Data Kategori-</option>
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Harga</label>
                            <input type="number" name="harga" required class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Deskripsi</label>
                            <textarea name="deskripsi" required class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md" ></textarea>
                        </div>
                        <div class="mt-4">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Thumbnail</label>
                            <input type="file" name="thumbnail" required class="block w-full bg-white dark:bg-transparent text-gray-800 mt-1 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-red-500 hover:bg-red-300 text-white rounded-md px-6 py-2">Tambah</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

