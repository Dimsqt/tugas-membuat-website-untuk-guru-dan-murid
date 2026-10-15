<?php

namespace Tests\Feature;

use App\Models\Informasi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolInfoSystemTest extends TestCase
{
    // Menggunakan RefreshDatabase agar database bersih saat test berjalan
    use RefreshDatabase;

    protected $admin;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Siapkan akun admin dan user untuk testing
        $this->admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@sekolah.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        $this->user = User::create([
            'name' => 'Siswa',
            'email' => 'siswa@sekolah.com',
            'password' => bcrypt('password123'),
            'role' => 'user',
        ]);
    }

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Selamat Datang');
    }

    public function test_admin_login_redirects_to_admin_dashboard(): void
    {
        $response = $this->post('/login', [
            'email' => 'admin@sekolah.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_user_login_redirects_to_user_beranda(): void
    {
        $response = $this->post('/login', [
            'email' => 'siswa@sekolah.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('user.beranda'));
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->actingAs($this->user)->get('/admin/dashboard');
        $response->assertStatus(403);
    }

    public function test_user_cannot_access_admin_crud(): void
    {
        $response = $this->actingAs($this->user)->get('/admin/informasi');
        $response->assertStatus(403);

        $response = $this->actingAs($this->user)->post('/admin/informasi', [
            'judul' => 'Judul Test',
            'kategori' => 'Umum',
            'isi' => 'Konten Test',
        ]);
        $response->assertStatus(403);
    }

    public function test_admin_can_access_dashboard_and_view_statistics(): void
    {
        Informasi::create([
            'judul' => 'Informasi Pertama',
            'kategori' => 'Pengumuman',
            'isi' => 'Konten pertama untuk tes',
            'user_id' => $this->admin->id,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Total Informasi');
        $response->assertSee('Informasi Pertama');
    }

    public function test_admin_can_create_new_informasi(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/informasi', [
            'judul' => 'Pengumuman Libur Semester',
            'kategori' => 'Pengumuman',
            'isi' => 'Libur semester dimulai minggu depan.',
        ]);

        $response->assertRedirect(route('admin.informasi.index'));
        $this->assertDatabaseHas('informasis', [
            'judul' => 'Pengumuman Libur Semester',
            'user_id' => $this->admin->id,
        ]);
    }

    public function test_admin_can_update_informasi(): void
    {
        $info = Informasi::create([
            'judul' => 'Judul Lama',
            'kategori' => 'Umum',
            'isi' => 'Isi lama',
            'user_id' => $this->admin->id,
        ]);

        $response = $this->actingAs($this->admin)->put("/admin/informasi/{$info->id}", [
            'judul' => 'Judul Baru',
            'kategori' => 'Akademik',
            'isi' => 'Isi sudah diperbarui',
        ]);

        $response->assertRedirect(route('admin.informasi.index'));
        $this->assertDatabaseHas('informasis', [
            'id' => $info->id,
            'judul' => 'Judul Baru',
        ]);
    }

    public function test_admin_can_delete_informasi(): void
    {
        $info = Informasi::create([
            'judul' => 'Informasi Dihapus',
            'kategori' => 'Umum',
            'isi' => 'Isi informasi yang akan dihapus',
            'user_id' => $this->admin->id,
        ]);

        $response = $this->actingAs($this->admin)->delete("/admin/informasi/{$info->id}");
        $response->assertRedirect(route('admin.informasi.index'));

        $this->assertDatabaseMissing('informasis', [
            'id' => $info->id,
        ]);
    }

    public function test_user_can_view_informasi_list_and_detail(): void
    {
        $info = Informasi::create([
            'judul' => 'Jadwal Ujian Siswa',
            'kategori' => 'Akademik',
            'isi' => 'Ujian dilaksanakan hari Senin.',
            'user_id' => $this->admin->id,
        ]);

        // User lihat daftar informasi
        $response = $this->actingAs($this->user)->get('/user/beranda');
        $response->assertStatus(200);
        $response->assertSee('Jadwal Ujian Siswa');

        // User lihat detail informasi
        $responseDetail = $this->actingAs($this->user)->get("/user/informasi/{$info->id}");
        $responseDetail->assertStatus(200);
        $responseDetail->assertSee('Ujian dilaksanakan hari Senin.');
    }

    public function test_deleted_informasi_is_not_displayed_to_user(): void
    {
        $info = Informasi::create([
            'judul' => 'Informasi Yang Dihapus',
            'kategori' => 'Umum',
            'isi' => 'Konten tidak boleh terlihat lagi',
            'user_id' => $this->admin->id,
        ]);

        // Hapus oleh admin
        $this->actingAs($this->admin)->delete("/admin/informasi/{$info->id}");

        // Verifikasi di halaman user
        $response = $this->actingAs($this->user)->get('/user/beranda');
        $response->assertDontSee('Informasi Yang Dihapus');
    }

    public function test_logout_redirects_to_login(): void
    {
        $response = $this->actingAs($this->user)->post('/logout');
        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}
