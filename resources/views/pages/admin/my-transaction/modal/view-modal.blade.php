<div class="modal fade" id="viewModal{{$row->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Account:</strong> {{ auth()->user()->name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{$row->email}}</li>
                    <li class="list-group-item"><strong>Receiver:</strong> {{$row->name}}</li>
                    <li class="list-group-item"><strong>Phone:</strong> {{$row->phone}}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{$row->addres}}</li>
                    <li class="list-group-item"><strong>Payment:</strong> {{$row->payment}}</li>
                    <li class="list-group-item"><strong>Created At:</strong> {{$row->created_at}}</li>
                    <li class="list-group-item"><strong>Payment URL:</strong> <a href="{{$row->payment_url}}">Click here</a></li>
                    <li class="list-group-item"><strong>Total:</strong> Rp. {{number_format( $row->total_price)}}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{$row->status}}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>