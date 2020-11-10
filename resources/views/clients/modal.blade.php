@foreach ($clients as $client)
<div class="modal fade" id="exampleModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data ini akan di hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Anda yakin ingin menghapus data ini {{$client->id}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                    {{ method_field('delete') }}
                    @csrf
                    <a href="{{ route('client.destroy', $client->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-danger">Hapus</button>
                    </a>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endforeach