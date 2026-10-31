<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';
$words = [
    'id' => [
        'login' => 'Masuk',
        'register' => 'Daftar Akun',
        'username' => 'Nama Pengguna',
        'password' => 'Kata Sandi',
        'btn_submit' => 'Kirim',
        'no_account' => 'Belum punya akun?',
        'have_account' => 'Sudah punya akun? Masuk',
        'logout' => 'Keluar',
        'error_empty' => 'Username dan Password tidak boleh kosong!',
        'error_login' => 'Username atau Password salah!',
        'error_exist' => 'Username sudah terdaftar!',
        'success_reg' => 'Akun berhasil dibuat. Silakan login.',
        'hero_title' => 'Noodle Peek!',
        'hero_desc' => 'Noodle---ing your task, then Peek!',
        'hero_desc_small' => '(as if you going to do it anyway)',
        'dashboard' => 'Noodle Peek!',
        'add_task' => 'Tambah Tugas',
        'task_name' => 'Nama Tugas',
        'status' => 'Status',
        'action' => 'Aksi',
        'pending' => 'Tertunda',
        'completed' => 'Selesai',
        'cancel' => 'Batal',
        'reschedule' => 'Jadwal Ulang',
        'not_started' => 'Belum Dimulai',
        'edit' => 'Ubah',
        'delete' => 'Hapus',
        'save' => 'Simpan',
        'welcome' => 'Selamat datang',
        'settings' => 'Pengaturan',
        'change_password' => 'Ubah Kata Sandi',
        'new_password' => 'Kata Sandi Baru',
        'delete_account' => 'Hapus Akun',
        'success_pass' => 'Kata sandi berhasil diubah!',
        'confirm_delete' => 'Apakah Anda yakin ingin menghapus akun?'
    ],
    'en' => [
        'login' => 'Login',
        'register' => 'Register',
        'username' => 'Username',
        'password' => 'Password',
        'btn_submit' => 'Submit',
        'no_account' => 'Don\'t have an account?',
        'have_account' => 'Already have an account? Login',
        'logout' => 'Logout',
        'error_empty' => 'Username and Password cannot be empty!',
        'error_login' => 'Invalid Username or Password!',
        'error_exist' => 'Username already exists!',
        'success_reg' => 'Account created successfully. Please login.',
        'hero_title' => 'Noodle Peek!',
        'hero_desc' => 'Noodle---ing your task, then Peek!',
        'hero_desc_small' => '(as if you going to do it anyway)',
        'dashboard' => 'Noodle Peek!',
        'add_task' => 'Add Task',
        'task_name' => 'Task Name',
        'status' => 'Status',
        'action' => 'Action',
        'pending' => 'Pending',
        'completed' => 'Completed',
        'cancel' => 'Cancel',
        'reschedule' => 'Re-schedule',
        'not_started' => 'Not Started Yet',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'welcome' => 'Welcome',
        'settings' => 'Settings',
        'change_password' => 'Change Password',
        'new_password' => 'New Password',
        'delete_account' => 'Delete Account',
        'success_pass' => 'Password changed successfully!',
        'confirm_delete' => 'Are you sure you want to delete your account?'
    ]
];

function __($key) {
    global $words, $lang;
    return $words[$lang][$key];
}
?>