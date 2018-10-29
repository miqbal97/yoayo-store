@extends('pengguna.master')

@section('title', 'Checkout')

@section('breadcrumb')
<div class="bg-light py-3" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="{{ route('beranda') }}">Beranda</a>
                <span class="mx-2 mb-0">/</span>
                <a href="{{ route('keranjang') }}">Keranjang</a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Checkout</strong>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border">

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="inp_nama_lengkap" class="text-black">Nama Lengkap <span class="text-danger">*</span></label>
                            {{ Form::text('nama_lengkap', !empty($default) ?  $default->nama_lengkap : null, [
                                'class'         => 'form-control',
                                'id'            => 'inp_nama_lengkap',
                                'placeholder'   => 'Nama Penerima'
                            ]) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="inp_no_telepon" class="text-black">No Telepon <span class="text-danger">*</span></label>
                            {{ Form::text('no_telepon', !empty($default) ?  $default->no_telepon : null, [
                                'class'         => 'form-control',
                                'id'            => 'inp_no_telepon',
                                'placeholder'   => 'No. Telepon Penerima'
                            ]) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="inp_alamat_rumah" class="text-black">Alamat <span class="text-danger">*</span></label>
                            {{ Form::textarea('alamat_rumah', !empty($default) ?  $default->alamat_rumah : null, [
                                'class'         => 'form-control',
                                'id'            => 'inp_alamat_rumah',
                                'rows'          => '5',
                                'placeholder'   => 'Tulis Alamat Tujuan'
                            ]) }}
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5 class="text-black">Pilih Tujuan</h5>
                        </div>
                        <div class="col-md-6">
                            <label for="inp_provinsi" class="text-black">Provinsi</label>
                            <select class="form-control" name="provinsi" id="inp_provinsi"></select>
                        </div>
                        <div class="col-md-6">
                            <label for="inp_kota" class="text-black">Kota</label>
                            <select class="form-control" name="kota" id="inp_kota"></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="inp_layanan" class="text-black">Service</label>
                            <select class="form-control" name="layanan" id="inp_layanan"></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <h5 class="text-black">Informasi Transfer Bank</h5>
                        </div>
                        <div class="col-md-4">
                            <label for="inp_bank" class="text-black">Nama Bank</label>
                            <select class="form-control" name="bank">
                                <option value>Pilih Bank...</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BCA">BCA</option>
                                <option value="MEGA">MEGA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inp_atas_nama" class="text-black">Atas Nama</label>
                            <input type="text" name="atas_nama" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inp_atas_nama" class="text-black">No. Rekening</label>
                            <input type="text" name="no_rekening" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inp_keterangan" class="text-black">Catatan Pengiriman ( Optional )</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                </thead>
                                <tbody id="detail_pesanan">
                                    <?php $biaya = 0; $berat = 0; ?>
                                    @foreach ($data_checkout as $item)
                                        <tr>
                                            <td>
                                                {{ $item->nama_barang }} <strong class="mx-2">x</strong> {{ $item->jumlah_beli }}<br>
                                                <small>Berat Barang : {{ $item->berat_barang.'gram' }}</small>
                                            </td>
                                            <td>{{ Rupiah::create($item->subtotal_biaya) }}</td>
                                        </tr>
                                        <?php $biaya += $item->subtotal_biaya; $berat += $item->berat_barang; ?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal Berat</th>
                                        <th id="berat">{{ $berat.'gram' }}</th>
                                    </tr>
                                    <tr>
                                        <th>Subtotal Biaya</th>
                                        <th data-biaya="{{ $biaya }}" id="biaya">{{ Rupiah::create($biaya) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Ongkos Kirim</th>
                                        <th id="ongkir"></th>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transfer Bank</a></h3>

                                <div class="collapse show" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0 text-black">
                                            Silahkan Transfer Ke Rekening Di Bawah :<br>
                                            {{ Html::image(asset('user_assets/images/mandiri_logo.jpg')) }} 12345678910 a/n nanda nurjanah<br><br>
                                            <small>
                                                Untuk saat ini kami hanya menggunakan rekening yang tertera di atas, <br>
                                                jika anda transfer pembayaran selain menggunakan rekening di atas kami tidak bertanggung jawab.
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-lg py-3 btn-block" disabled>Proses Pesanan</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
     </div>
</div>
@endsection

@section('custom_js')
<script type="text/javascript">
    $(document).ready(function(){
        var url = 'http://'+window.location.host
        $.get(url+'/get_provinsi').done(function(result){
            if($.parseJSON(result)['rajaongkir']['status']['code'] == 200) {
                var data = $.parseJSON(result)['rajaongkir']['results']
                var elemen = '<option value>Pilih Provinsi...</option>'
                for(var value of data){
                    elemen += '<option value="'+value['province_id']+'">'+value['province']+'</option>'
                }
                $('select#inp_provinsi').append(elemen)
            } else {
                alert('Terjadi Kesalahan Saat Menghubungi Server')
            }
        })
    })
    $('#inp_provinsi').click(() => {
        var url = 'http://'+window.location.host
        var results = $('#inp_provinsi').find(':selected').val()
        $.get(url+'/get_kota?provinsi', {'provinsi': results}).done(function(result){
            if($.parseJSON(result)['rajaongkir']['status']['code'] == 200) {
                var data = $.parseJSON(result)['rajaongkir']['results']
                var elemen = '<option value>Pilih Kota...</option>'
                $('#inp_kota').html(' ')
                for(var value of data){
                    if(value['type'] == "Kota") {
                        elemen += '<option value="'+value['city_id']+'">Kota. '+value['city_name']+'</option>'
                    } else {
                        elemen += '<option value="'+value['city_id']+'">Kab. '+value['city_name']+'</option>'
                    }
                }
                $('select#inp_kota').append(elemen)
            } else {
                alert('Terjadi Kesalahan Saat Menghubungi Server')
            }
        })
    })
    $('#inp_kota').click(() => {
        var url = 'http://'+window.location.host
        var kota = $('#inp_kota').find(':selected').val()
        var berat = {{ $berat }}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.post(url+'/get_cost', {'kota': kota, 'berat': berat}).done(function(result){
            if($.parseJSON(result)['rajaongkir']['status']['code'] == 200) {
                var data = $.parseJSON(result)['rajaongkir']['results'][0]['costs']
                var elemen = '<option value>Pilih Service...</option>'
                $('#inp_layanan').html(' ')
                for(var value of data){
                    console.log(value)
                    elemen += '<option value="'+value['cost'][0]['value']+'">'+value['service']+' '+value['cost'][0]['etd']+' hari Rp. '+value['cost'][0]['value']+'</option>'
                }
                $('select#inp_layanan').append(elemen)
            } else {
                alert('Terjadi Kesalahan Saat Menghubungi Server')
            }
        })
    })
    $('#inp_layanan').click(() => {
        $('th#ongkir').html('Rp. '+$('#inp_layanan').find(':selected').val())
    })
</script>
@endsection