

<div class="row justify-content-center">
    <div class="modal fade" id="delete-item">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="mx-auto pt-3">Do you really want to delete it ?</h2>
                </div>
                <div class="modal-body">
                    <div class="mt-3 align-items-center">
                        <div class="card card-modal">
                            <div class="card-body">
                                <img src="{{$item->image}}"
                                alt="Item Image"
                                class="card-img-top mb-1 rounded" style="height: 150px; object-fit: cover;" >   
                            </div>
                            <div class="card-footer">
                                <div class="card-text">
                                    <p class="h2 text-center">ITEM NAME</p>
                                    <p class="h4 text-center">{{$item->name}}</p>
                                    <p class="h5 px-1">PRICE : {{$item->price}} $</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('item.destroy' , $item->id)}}" method="post" class="modal-form">
                        @csrf
                        @method('DELETE')
    
                        <button type="button" class="modal-cancel-button" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="modal-delete-button">DELETE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>