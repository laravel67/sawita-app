<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="card-body">
            <div class="d-md-flex align-item-center justify-content-around">
                <div class="col-md-3 mb-2">
                    <a class="btn btn-primary" href="{{ route('category.create') }}"><i
                            class="fas fa-plus"></i>Tambah</a>
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
                            <th>Jenis Pupuk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                        <tr>
                            <td>{{$categories->firstItem()+$index }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('category.edit',$category->id) }}"
                                        class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i></a>
                                    <form id="delete-form" action="{{ route('category.destroy', $category->id) }}"
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
                        <td>tidak ada kategori</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </div>
</div>