@include('front_end.layouts.head')

@include('front_end.layouts.nav')

<main>
    <div class="container marketing mt-5">
        <div class="row">
            <h2 class="featurette fw-normal lh-1"><strong>Pengumuman Pendaftaran - SMK AL HUSNA</strong></h2>
        </div>
        <hr class="featurette">
        <div class="row">
            @if($pengumuman->isEmpty())
                <span class="text-center mt-5"><b>Pengumuman Belum Tersedia</b></span>
            @else
            <table class="table">
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($pengumuman as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                            </td>
                            <td>
                                <a href="{{ route('pengumuman-pendaftaran.show', $item->uuid) }}" class="float-end">{{ $item->judul }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            @endif
        </div>
    </div><!-- /.container -->
</main>
{{-- 
@include('front_end.layouts.foot') --}}
