<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="card-body">
            <div class="d-md-flex align-item-center justify-content-around">
                <div class="col-md-3 mb-md-2">
                    <a class="btn btn-primary" href="{{ route('pupuk.create') }}"><i class="fas fa-plus"></i>Tambah</a>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="search" wire:model.live="search" class="form-control" placeholder="Pencarian...">
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Pupuk</th>
                            <th>Kategori/Jenis</th>
                            <th>Stok</th>
                            <th>Manfaat/Kegunaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="pupukTable">
                        @forelse ($pupuks as $i=> $pupuk)
                        <tr>
                            <td>{{ $pupuks->firstItem()+$i }}</td>
                            <td>
                                @if ($pupuk->image)
                                <a href="{{ asset('storage/'. $pupuk->image) }}" data-toggle="lightbox"
                                    data-caption="{{ $pupuk->name }}">
                                    <img src="{{ asset('storage/'. $pupuk->image) }}" class="img-fluid" width="50">
                                </a>
                                @else
                                <img src="{{ asset('images.avif') }}" class="img-fluid" width="50">
                                @endif
                            </td>
                            <td>{{ $pupuk->name }}</td>
                            <td>{{ $pupuk->category->name }}</td>
                            <td>{{ $pupuk->stok }} {{ $pupuk->satuan }}</td>
                            <td>
                                <a href="#showModal{{ $pupuk->id }}" class="btn btn-outline-light btn-sm"
                                    data-bs-toggle="modal">Lihat Sekarang</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('pupuk.edit', $pupuk->id) }}"
                                        class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i></a>
                                    <form id="delete-form" action="{{ route('pupuk.destroy', $pupuk->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>{{ __('Belum ada pupuk.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $pupuks->links() }}
        </div>
    </div>
    @include('dashboard.pupuk.show-modal')
</div>