@extends('app')

@section('content')
    <div class="py-10">
        <div class="text-center mb-16 animate-fade-up">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Tim Kami</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Para pemikir kreatif di balik ReadSpace Library, berdedikasi untuk membangun pengalaman membaca digital terbaik bagi mahasiswa Polibatam.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $team = [
                    ['name' => 'M. Luthfi Causart Azavi', 'nim' => '3312501052', 'color' => 'bg-red-50 text-burgundy-500'],
                    ['name' => 'Muhammad Risky Kurnia', 'nim' => '3312501056', 'color' => 'bg-rose-50 text-maroon'],
                    ['name' => 'Siti Halimah Chania', 'nim' => '3312501057', 'color' => 'bg-orange-50 text-orange-700'],
                    ['name' => 'Zahrah Athirah Badiah', 'nim' => '3312501060', 'color' => 'bg-purple-50 text-indigo-900'],
                ];
            @endphp

            @foreach($team as $index => $member)
            <div class="glass-panel p-8 text-center hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group animate-fade-up border-white/60" style="animation-delay: {{ $index * 100 }}ms">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full {{ $member['color'] }} flex items-center justify-center text-3xl font-bold shadow-inner">
                    {{ substr($member['name'], 0, 1) }}
                </div>
                <p class="font-bold text-xl text-gray-800 mb-2 group-hover:text-burgundy-500 transition-colors">{{ $member['name'] }}</p>
                <div class="space-y-1">
                    <p class="text-sm font-medium text-gray-400">NIM : {{ $member['nim'] }}</p>
                    <p class="text-sm font-medium text-gray-400">Prodi : Teknik Informatika</p>
                    <div class="mt-6 pt-6 border-t border-red-50">
                        <span class="px-4 py-1.5 rounded-full bg-white text-[10px] font-bold text-gray-400 uppercase tracking-widest border border-red-50">Anggota Tim</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection