<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-200">Tambah Kategori</h3>
                    <span class="text-sm">Form menambahkan kategori produk</span>
                </div>

                <div class="py-6 px-6">
                    <form action="" method="post">
                        @csrf
                        <div class="mt-4 px-6">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Nama Kategori</label>
                            <input type="text" name="nama_kategori" required class="block w-full bg-transparent text-gray-800 dark:text-gray-200 rounded-md">
                        </div>
                        <div class="mt-4 px-6">
                            <label class="block w-full text-gray-800 dark:text-gray-200">Thumbnail</label>
                            <input type="file" name="thumbnail" required class="block w-full bg-transparent text-gray-800 dark:text-gray-200 rounded-md">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

