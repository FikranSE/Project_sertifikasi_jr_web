<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Form Update -->
                <form method="POST" action="{{ route('periksa.update', $periksa->No_periksa) }}">
                    @csrf
                    @method('PUT') <!-- Menggunakan PUT untuk update -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                        <!-- No Periksa -->
                        <div class="mb-4">
                            <label for="No_periksa" class="block text-gray-700">No. Periksa</label>
                            <input type="text" id="No_periksa" name="No_periksa" value="{{ old('No_periksa', $periksa->No_periksa) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('No_periksa')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Tanggal Periksa -->
                        <div class="mb-4">
                            <label for="Tgl_periksa" class="block text-gray-700">Tanggal Periksa</label>
                            <div class="flex space-x-2">
                                <input type="number" id="tanggal" name="tanggal" value="{{ old('tanggal', $periksa->tanggal) }}" min="1" max="31" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required placeholder="DD">
                                <input type="number" id="bulan" name="bulan" value="{{ old('bulan', $periksa->bulan) }}" min="1" max="12" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required placeholder="MM">
                                <input type="number" id="tahun" name="tahun" value="{{ old('tahun', $periksa->tahun) }}" class="mt-1 block w-1/3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required placeholder="YYYY">
                            </div>
                            @error('Tgl_periksa')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Pasien -->
                        <div class="mb-4">
                            <label for="Pasien_id" class="block text-gray-700">Pasien</label>
                            <select id="Pasien_id" name="Pasien_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="">-- Pilih Pasien --</option>
                                @foreach($pasien as $p)
                                    <option value="{{ $p->Pasien_id }}" {{ old('Pasien_id', $periksa->Pasien_id) == $p->Pasien_id ? 'selected' : '' }}>
                                        {{ $p->Pasien_nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Pasien_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Dokter -->
                        <div class="mb-4">
                            <label for="Dokter_id" class="block text-gray-700">Dokter</label>
                            <select id="Dokter_id" name="Dokter_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokter as $d)
                                    <option value="{{ $d->Dokter_id }}" {{ old('Dokter_id', $periksa->Dokter_id) == $d->Dokter_id ? 'selected' : '' }}>
                                        {{ $d->Dokter_nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Dokter_id')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Keluhan -->
                        <div class="mb-4">
                            <label for="Keluhan" class="block text-gray-700">Keluhan</label>
                            <input type="text" id="Keluhan" name="Keluhan" value="{{ old('Keluhan', $periksa->Keluhan) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('Keluhan')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Diagnosa -->
                        <div class="mb-4">
                            <label for="Diagnose" class="block text-gray-700">Diagnosa</label>
                            <input type="text" id="Diagnose" name="Diagnose" value="{{ old('Diagnose', $periksa->Diagnose) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('Diagnose')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <!-- Biaya Admin -->
                        <div class="mb-4">
                            <label for="Biaya_admin" class="block text-gray-700">Biaya Admin</label>
                            <input type="number" id="Biaya_admin" name="Biaya_admin" value="{{ old('Biaya_admin', $periksa->Biaya_admin) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            @error('Biaya_admin')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                
                    </div>
                
                    <button type="submit" class="mt-4 w-full bg-gray-800 text-white py-2 rounded-md hover:bg-gray-900">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
