<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Periksa') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}'
        });
    </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Pencarian -->
            <div class="mb-6 flex justify-between items-center">
                <form method="GET" action="{{ route('periksa.index') }}" class="flex space-x-2">
                    <input type="text" name="search" placeholder="Cari Data Periksa..." class="px-4 py-2 border border-gray-300 rounded-md" value="{{ request('search') }}">
                    <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-md">Cari</button>
                </form>
                <a href="{{ route('periksa.create') }}" class="inline-block bg-gray-800 hover:bg-gray-900 text-white px-6 py-2 rounded-md">
                    Tambah Data Periksa
                </a>
            </div>
            
            <!-- Table Section -->
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">No. Periksa</th>
                            <th class="px-4 py-2 text-left">Id Pasien</th>
                            <th class="px-4 py-2 text-left">Nama Pasien</th>
                            <th class="px-4 py-2 text-left">Usia</th>
                            <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                            <th class="px-4 py-2 text-left">Keluhan</th>
                            <th class="px-4 py-2 text-left">Diagnosa</th>
                            <th class="px-4 py-2 text-left">Nama Poli</th>
                            <th class="px-4 py-2 text-left">Nama Dokter</th>
                            <th class="px-4 py-2 text-left">Biaya Admin</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($periksa as $p)
                        <tr class="border-b hover:bg-gray-200">
                            <td class="px-4 py-2">{{ $p->No_periksa }}</td>
                            <td class="px-4 py-2">{{ $p->pasien ? $p->pasien->Pasien_id : 'Id Pasien tidak ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $p->pasien ? $p->pasien->Pasien_nama : 'Pasien tidak ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $p->pasien ? $p->pasien->Usia : 'Usia tidak ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $p->pasien ? $p->pasien->Jenis_kelamin : 'Jenis Kelamin tidak ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $p->Keluhan }}</td>
                            <td class="px-4 py-2">{{ $p->Diagnose }}</td>
                            <td class="px-4 py-2">{{ $p->dokter && $p->dokter->poli ? $p->dokter->poli->Poli_nama : 'Poli tidak ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $p->dokter ? $p->dokter->Dokter_nama : 'Dokter tidak ditemukan' }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-xs text-white font-semibold rounded-full 
                                    {{ $p->Biaya_admin > 100000 ? 'bg-green-500' : ($p->Biaya_admin > 50000 ? 'bg-yellow-500' : 'bg-red-500') }}">
                                    Rp {{ number_format($p->Biaya_admin, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-center flex items-center justify-center space-x-4">
                                <!-- Edit Icon -->
                                <a href="{{ route('periksa.edit', $p->No_periksa) }}" class="hover:text-blue-900 text-gray-800 p-2 rounded-full">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('periksa.destroy', $p->No_periksa) }}" method="POST" class="inline" id="delete-form-{{ $p->No_periksa }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ $p->No_periksa }}')" class="hover:text-red-900 text-gray-800 p-2 rounded-full">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="m-4">
                    {{ $periksa->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(noPeriksa) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data periksa ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + noPeriksa).submit();
                }
            });
        }
    </script>
</x-app-layout>
