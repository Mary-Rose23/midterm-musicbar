<div>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block m-2 d-flex justify-content-between">
            <div class="mt-1">
                <strong>{{ $message }}</strong>
            </div>

            <div class="btn close ms-auto" data-dismiss="alert">x</div>
        </div>
    @endif
    <div class="container">
        <div class="mx-auto row mt-5 mb-2 d-flex justify-content-between">
            <div class="col-md-2 mt-5 mb-5">
                <label class="fw-bold fs-4">Genre</label>
                <div class="d-flex justify-content-center mb-2">
                    <div class="form-check">
                        <input wire:model='Classical' name='Classical' class="form-check-input" type="checkbox" value="Classical"
                            id="Classical">
                        <label class="form-check-label me-2" for="Classical">
                            Classical
                        </label>
                    </div>
                    <div class="form-check ">
                        <input wire:model='Rock' name="Rock" class="form-check-input" type="checkbox" value="Rock"
                            id="Rock">
                        <label class="form-check-label" for="Rock">
                            Rock
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <div class="form-check">
                        <input wire:model='Acoustic' class="form-check-input" type="checkbox" value="Acoustic"
                            id="Acoustic">
                        <label class="form-check-label me-2" for="Acoustic">
                            Acoustic
                        </label>
                    </div>
                    <div class="form-check me-2">
                        <input wire:model='Pop' name="Pop" class="form-check-input" type="checkbox" value="Pop"
                            id="Pop">
                        <label class="form-check-label" for="Pop">
                            Pop
                        </label>
                    </div>
                </div>
                <div class="form-check d-flex justify-content-center mb-2">
                    <input wire:model='Reggae' class="form-check-input" type="checkbox" value="Reggae" id="Reggae">
                    <label class="form-check-label" for="Reggae">
                        Reggae
                    </label>
                </div>
                <hr>
                <div class="mb-3" style="width: 240px;">
                    <label class="fw-bold fs-4">Location</label>
                    <select class="form-select" wire:model="Location">
                        <option value="all">Select Location</option>
                        @foreach ($music as $mub)
                            <option value="{{ $mub->location }}">{{ $mub->location }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="" style="width: 240px;">
                    <label class="fw-bold fs-4">Sort by </label>
                    <select name="" id="" class="form-select" wire:model='sort'>
                        <option value="asc">Lowest to Highest</option>
                        <option value="desc">Highest to Lowest</option>
                    </select>
                </div>
                <hr>
                <div class="">
                    <label class="fw-bold fs-4" for="customRange2">Rate</label><br>
                    <input type="range" class="form-range" min="500" max="9000" id="customRange2"
                        style="width: 250px;" wire:model='Rate'>
                    <p>P{{ $this->Rate }}</p>

                </div>
                <hr>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-danger mt-2" wire:click='resetFilters' type='button'>
                        Reset Filter</button>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $music->links() }}
                </div>
            </div>

            <div class="col-md-8">
                <div class="d-flex justify-content-between">
                    <h3 class="fst-italic text-white col-md-6">Discover your Grind!</h3>
                    <div class="col-md-5">
                        <input type="search" wire:model="search" class="form-control input" placeholder="Search">
                    </div>
                    <div class="col-md-2 ms-5">
                        <a class="ms-auto mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a>
                    </div>
                    <div wire:ignore.self class="modal modal-lg fade" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-dark">
                                    <h3 class="modal-title text-white" id="exampleModalLabel">Add Music band</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="green-body  bg-secondary">
                                    <form wire:submit.prevent="addMusic()">
                                        @csrf
                                        <div class="container mx-auto">
                                            <div class="row">
                                                <div class="col-md-12 d-flex justify-content-between">
                                                    <div class="form-group me-3">
                                                        <label for="" class="text-white"
                                                            style="color:dimgray">Image:</label>
                                                        <input type="file" wire:model="image"
                                                            class="form-control">

                                                        @error('image')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        @if ($image)
                                                            New Photo: <br>
                                                            <img src="{{ $image->temporaryUrl() }}"
                                                                style="width:2cm; height:100px" class="rounded">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group d-flex justify-content-between">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="" class="text-white"
                                                                    style="color:dimgray">Band Name:</label>
                                                                <input type="text" class="form-control"
                                                                    wire:model="band">
                                                                @error('band')
                                                                    <span
                                                                        class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="text-white"
                                                                style="color:dimgray">Rate</label>
                                                            <input type="number" class="form-control"
                                                                wire:model="rate">
                                                            @error('rate')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="genre" class="text-white"
                                                            style="color:dimgray">Genre</label>
                                                        <select class="form-select" wire:model="genre"
                                                            id="genre">
                                                            <option value="Reggae">Reggae</option>
                                                            <option value="Classical">Classical</option>
                                                            <option value="Rock">Rock</option>
                                                            <option value="Pop">Pop</option>
                                                            <option value="Acoustic">Acoustic</option>
                                                        </select>
                                                        @error('genre')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="" class="text-white"
                                                            style="color:dimgray">Contact No.</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="contact">
                                                        @error('contact')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="text-white"
                                                            style="color:dimgray">Location</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="location">
                                                        @error('location')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="text-white"
                                                            style="color:dimgray">History</label>
                                                        <textarea type="text" class="form-control" wire:model="history"></textarea>
                                                        @error('history')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between ">
                    @foreach ($music as $msc)
                        <div data-bs-toggle="modal" data-bs-target="#viewMusic{{ $msc->id }}"
                            class="mb-3 buttonpage me-3 d-flex justify-content-between"
                            style="max-width: 260px;">
                            <div class="container">
                                <img src="{{ asset('storage') }}/{{ $msc->image }}" class="img-fluid mt-2 mb-2"
                                    alt="...">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h5 class="card-title me-5">{{ $msc->band }}</h5>

                                        <label class="card-text"><span class="fst-italic">Location: </span> <span
                                                class="fw-semibold"> {{ $msc->location }} </span></label><br>
                                        <label class="card-text"><span class="fst-italic">Rate: </span> <span
                                                class="fw-semibold">P{{ $msc->rate }} </span></label><br>
                                        <label class="card-text"><span class="fst-italic">Genre: </span> <span
                                                class="fw-semibold"> {{ $msc->genre }} </span></label>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <a class="ms-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#updateMusic">
                                            <svg wire:click="editMusic({{ $msc->id }})"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="blue" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            class="ms-1">
                                            <svg wire:click="deleteMusic({{ $msc->id }})"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                            <div class="modal-body bg-danger">
                                                Are you sure you want to delete this band?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button wire:click="destroyMusic"
                                                    class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('livewire.page')
                        </div>
                        <div wire:ignore.self class="modal modal-lg fade" id="updateMusic" tabindex="-1"
                            aria-labelledby="updateMusicLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark">
                                        <h3 class="modal-title text-white" id="updateMusicLabel">Edit Music Band</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body gradient">
                                        <form wire:submit.prevent="updateMusic()">
                                            @csrf
                                            <div class="container mx-auto">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-between">
                                                        <div class="form-group me-3">
                                                            <label for="" class="text-white"
                                                                style="color:dimgray">Image:</label>
                                                            <input type="file" wire:model="image"
                                                                class="form-control">
                                                            <img style="width:80px; height:80px"
                                                                src="{{ asset('storage') }}/{{ $msc->image }}"
                                                                class="img-fluid mt-2 mb-2" alt="...">
                                                            @error('image')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if ($image)
                                                                New Photo: <br>
                                                                <img src="{{ $image->temporaryUrl() }}"
                                                                    style="width:100px; height:100px" class="rounded">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group d-flex justify-content-between">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-white"
                                                                        style="color:dimgray">Band Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        wire:model="band">
                                                                    @error('band')
                                                                        <span
                                                                            class="error text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="" class="text-white"
                                                                    style="color:dimgray">Rate</label>
                                                                <input type="number" class="form-control"
                                                                    wire:model="rate">
                                                                @error('rate')
                                                                    <span
                                                                        class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="genre" class="text-white"
                                                                style="color:dimgray">Genre</label>
                                                            <select class="form-select" wire:model="genre"
                                                                id="genre">
                                                                <option value="Reggae">Reggae</option>
                                                                <option value="Classical">Classical</option>
                                                                <option value="Rock">Rock</option>
                                                                <option value="Pop">Pop</option>
                                                                <option value="Acoustic">Acoustic</option>
                                                            </select>
                                                            @error('genre')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="" class="text-white"
                                                                style="color:dimgray">Contact No.</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="contact">
                                                            @error('contact')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="text-white"
                                                                style="color:dimgray">Location</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="location">
                                                            @error('location')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="text-white"
                                                                style="color:dimgray">History</label>
                                                            <textarea type="text" class="form-control" wire:model="history"></textarea>
                                                            @error('history')
                                                                <span class="error text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
