<div>
    <div wire:ignore.self class="modal fade modal-lg" id="viewMusic{{ $msc->id }}" tabindex="-1"
        aria-labelledby="viewBandLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger border border-dark rounded-3 border-5">
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage') }}/{{ $msc->image }}" class="rounded"
                            style="width:170px; height:150px" alt="...">
                    </div>
                    <div class="mx-auto mt-2">
                        <h3 class="text-center fw-bold">{{ $msc->band }}</h3>
                        <h6 class="text-center fw-light"> <span class="fst-italic">Should you have inquiries, contact us
                                here:
                            </span>{{ $msc->contact }}</h6>

                    </div>
                    <hr>
                    <h5 class="font-a">Band's History:</h5>
                    <p class="text-center">{{ $msc->history }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/booking') }}" class="btn gradient rounded-pill">Book Now</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
