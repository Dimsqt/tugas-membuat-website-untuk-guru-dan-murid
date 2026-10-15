<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    // membuat data awal informasi untuk pengujian
    public function run(): void
    {
        $dataInformasi = [
            [
                'judul' => 'Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026',
                'isi' => 'Sekolah membuka pendaftaran peserta didik baru untuk tahun ajaran 2025/2026. Pendaftaran dibuka mulai tanggal 1 Juni hingga 30 Juni 2025. Persyaratan meliputi: fotokopi rapor terakhir, fotokopi akta kelahiran, pas foto 3x4 sebanyak 4 lembar, dan surat keterangan lulus dari sekolah asal. Pendaftaran dapat dilakukan secara online melalui website sekolah atau datang langsung ke sekretariat PPDB.',
                'kategori' => 'Pengumuman',
                'user_id' => 1,
            ],
            [
                'judul' => 'Jadwal Ujian Akhir Semester Ganjil',
                'isi' => 'Ujian Akhir Semester (UAS) Ganjil akan dilaksanakan pada tanggal 9-20 Desember 2025. Seluruh siswa diwajibkan hadir 30 menit sebelum ujian dimulai. Siswa yang tidak hadir tanpa keterangan akan dianggap tidak mengikuti ujian. Jadwal lengkap per mata pelajaran dapat dilihat di papan pengumuman sekolah atau melalui halaman informasi ini.',
                'kategori' => 'Akademik',
                'user_id' => 1,
            ],
            [
                'judul' => 'Kegiatan Ekstrakurikuler Semester Genap',
                'isi' => 'Pendaftaran kegiatan ekstrakurikuler untuk semester genap dibuka mulai 6 Januari 2025. Tersedia berbagai pilihan ekskul seperti: Pramuka, PMR, Basket, Futsal, Paduan Suara, Robotik, English Club, dan Jurnalistik. Setiap siswa wajib mengikuti minimal 1 ekskul dan maksimal 3 ekskul. Formulir pendaftaran tersedia di ruang OSIS.',
                'kategori' => 'Kegiatan',
                'user_id' => 1,
            ],
            [
                'judul' => 'Sosialisasi Kurikulum Merdeka Belajar',
                'isi' => 'Dalam rangka implementasi Kurikulum Merdeka Belajar, sekolah mengadakan sosialisasi kepada seluruh orang tua dan wali murid. Acara akan dilaksanakan pada hari Sabtu, 18 Januari 2025 pukul 08.00-12.00 WIB di Aula Sekolah. Materi yang akan disampaikan meliputi: konsep kurikulum merdeka, projek penguatan profil pelajar Pancasila, dan sistem penilaian terbaru. Kehadiran orang tua sangat diharapkan.',
                'kategori' => 'Pengumuman',
                'user_id' => 1,
            ],
            [
                'judul' => 'Lomba Karya Tulis Ilmiah Antar SMA Se-Kota',
                'isi' => 'Sekolah akan mengikutsertakan perwakilan siswa dalam Lomba Karya Tulis Ilmiah (LKTI) Tingkat Kota yang diselenggarakan oleh Dinas Pendidikan. Siswa yang berminat dapat mendaftarkan diri ke guru pembimbing paling lambat 25 Januari 2025. Tema LKTI tahun ini adalah "Inovasi Teknologi untuk Pendidikan Berkelanjutan". Pemenang akan mendapatkan piagam, trofi, dan beasiswa pendidikan.',
                'kategori' => 'Akademik',
                'user_id' => 1,
            ],
            [
                'judul' => 'Peringatan Hari Pendidikan Nasional',
                'isi' => 'Dalam rangka memperingati Hari Pendidikan Nasional tanggal 2 Mei 2025, sekolah akan mengadakan serangkaian kegiatan meliputi: upacara bendera, lomba cerdas cermat, pameran karya siswa, dan pentas seni. Seluruh siswa diharapkan berpartisipasi aktif. Panitia pelaksana terdiri dari pengurus OSIS dan guru pembina. Informasi lebih lanjut akan diumumkan melalui masing-masing wali kelas.',
                'kategori' => 'Kegiatan',
                'user_id' => 1,
            ],
        ];

        foreach ($dataInformasi as $data) {
            Informasi::create($data);
        }
    }
}
