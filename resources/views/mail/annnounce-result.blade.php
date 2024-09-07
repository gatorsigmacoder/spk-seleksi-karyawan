<x-mail::message>
<p class="fs-5">Hasil Seleksi</p>

<p class="fs-6">Hi, {{ $dataEmail['nama'] }}</p>

@if($dataEmail['status'] == true)
<p class="fs-6">Selamat anda kami terima!</p>
<p class="fs-6">Untuk info selanjutnya hubungi pihak terkait.</p>
@else
<p class="fs-6">Mohon maaf, anda belum dapat kami terima.</p>
<p class="fs-6">Jangan menyerah, masih ada hari esok.</p>
@endif

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
