<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-semibold text-gray-200">Kategori Produk</h3>
                    <span class="text-sm">Semua data kategori, Klik pada nama kategori untuk melihat detail</span>
                </div>

                {{-- button create --}}
                <div class="mt-4 px-6">
                    <a href="{{route('kategori.create')}}" class="text-md font-semibold text-red-500 hover:text-red-300">Tambah Kategori</a>
                </div>

                {{-- Table Kategori --}}
                <div class="overflow-x-auto px-6 py-6">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead class="bg-red-500 text-white">
                            <th class="py-1 px-4 uppercase text-sm">Nama Kategori</th>
                            <th class="py-1 px-4 uppercase text-sm">Thumbnail</th>
                            <th class="py-1 px-4 uppercase text-sm">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="py-1 px-4 dark:text-gray-200">{{$item->nama_kategori}}</td>
                                    <td class="py-1 px-4 dark:text-gray-200">
                                        <img src="{{asset('storage/images/kategori/' . $item->thumbnail)}}" width="100" alt="">
                                    </td>
                                    <td>
                                        <form action="{{route('kategori.delete', $item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('kategori.detail', $item->id)}}" class="text-md font-semibold text-red-500">Detail</a>
                                            <button type="submit" class="text-md font-semibold text-red-500 ml-4" onclick="return confirm('yakin mau dihapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>