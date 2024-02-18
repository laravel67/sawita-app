@foreach ($pupuks as $pupuk)
<div class="modal fade" id="showModal{{ $pupuk->id }}" tabindex="-1" role="dialog" aria-labelledby="showModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModal">{{ __('Kegunaan/Manfaat & Cara Pemakaian
                    :').$pupuk->name }}
                </h5>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @if ($pupuk->image)
                    <img src="{{ asset('storage/'. $pupuk->image) }}" alt="{{ $pupuk->image }}">
                    @else
                    <img src="{{ asset('images.avif') }}" alt="{{ $pupuk->image }}" width="400">
                    @endif
                </div>
                <article>
                    <h4>{{ __('Kegunaan/Manfaat:') }}</h4>
                    {{ $pupuk->manfaat }}
                    <hr>
                    <h4>{{ __('Cara Pemakaian: ') }}</h4>
                    <p>
                        {!! $pupuk->penggunaan !!}
                    </p>
                </article>
            </div>
            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Tutup</span>
            </button>
        </div>
    </div>
</div>
@endforeach