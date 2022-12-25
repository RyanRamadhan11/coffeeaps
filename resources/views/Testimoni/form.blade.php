@extends('Admin.home')
@section('content')
<section class="section">
    <h2 style="margin: 10px 0px 10px 10px; ">Dashboard</h2>
        <nav>
            <ol class="breadcrumb mb-4 " style="margin-left: 10px;">
                <li class="breadcrumb-item"><a style="text-decoration: none; color: black;" href="{{ url('testimoni') }}">Testimoni</a></li>
                <li class="breadcrumb-item active">Form Update Testimoni</li>
            </ol>
        </nav>
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="mt-4" style="width:550px; margin-left:18px;">
                    <a class="btn btn-warning btn-sm fw-bold" title="Kembali" 
                        href=" {{ url('testimoni') }}">
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </a>
                </div>

                <div class="card-body">
                    <h5 class="card-title text-center mb-5">Form Input Testimoni</h5>

                    <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi Kesalahan saat input data<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->
                    <form class="row g-3" method="POST" action="{{ route('testimoni.store')}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-6">
                            <label class="form-label">Nama User</label>
                            <div class="col-sm-12">
                                <select class="form-select form-control @error('users_id') 
                                        is-invalid @enderror" name="users_id">
                                    <option value="">-- Pilih User Id --</option>
                                    @foreach($ar_users as $user)
                                    @php $sel = ( old('user_id') == $user->id) ? 'selected' : ''; @endphp
                                    <option value="{{ $user->id }}" {{ $sel }}>{{ $user->name}}</option>
                                    @endforeach
                                </select>
                                @error('users_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="inputNane4" class="form-label">Isi Pesan</label>
                            <textarea class="form-control @error('pesan') is-invalid @enderror" 
                            name="pesan" style="height: 100px">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center mt-5 mb-5" style="border-radius: 130px;">
                            <button type="submit" class="btn btn-success" style="margin-right: 10px;">Simpan</button>
                            <button type="reset" class="btn btn-dark" style="margin-right: 10px;">Batal</button>
                        </div>
                        
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection