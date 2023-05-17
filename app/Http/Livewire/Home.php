<?php

namespace App\Http\Livewire;

use App\Models\Band;
use Livewire\Component;
use Livewire\WithFileUploads;

class Home extends Component
{
    use WithFileUploads;
    public $band, $location, $rate, $contact, $history, $image, $genre = [''];
    public $search;
    public $Location = 'all';
    public $sort = "asc";
    public $Rate;
    public $Acoustic = '';
    public $Pop = '';
    public $Rock = '';
    public $Reggae = '';
    public $Classical = '';

    public function addMusic(){

        $this->validate([
            'band' => 'string|required',
            'history' => 'string|required',
            'contact' => 'required',
            'location' => 'string|required',
            'genre' => 'required',
            'rate' => 'string|required',
            'image' => 'image|required', // 1MB Max
        ]);

        Band::create([
            'band' => $this->band,
            'history' => $this->history,
            'contact' => $this->contact,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
            'image' => $this->image->store('music-images', 'public')]);

            return redirect('/')->with('message', 'Created Successfully');
    }

    public function editMusic(int $music_id){
        $music = Band::find($music_id);
        if($music){
            $this->music_id = $music->id;
            $this->band = $music->band;
            $this->history = $music->history;
            $this->contact = $music->contact;
            $this->location = $music->location;
            $this->genre = $music->genre;
            $this->rate = $music->rate;

        }else{
            return redirect()->to('/');
        }

    }

    public function updateMusic(){
        $this->validate([
            'band' => 'string|required',
            'history' => 'string|required',
            'contact' => 'required',
            'location' => 'string|required',
            'genre' => 'required',
            'rate' => 'string|required',
            'image' => ['nullable'],

        ]);
        try{
        $music = Band::find($this->id);

        Band::where('id',$this->music_id)->update([
            'band' => $this->band,
            'history' => $this->history,
            'contact' => $this->contact,
            'location' => $this->location,
            'genre' => $this->genre,
            'rate' => $this->rate,
        ]);

        if($this->image != null){
            Band::where('id',$this->music_id)->update(['image' => $this->image->store('music-images', 'public')]);
        }
        }catch(\Exception $e){
            return redirect('/')->with('message', 'Updated Successfully');
        }
        return redirect('/')->with('message', 'Updated Successfully');
    }

    public function deleteMusic(int $music_id)
    {
        $this->music_id = $music_id;
    }

    public function destroyMusic()
    {
        Band::find($this->music_id)->delete();
        return redirect('/')->with('message', 'Deleted Successfully');

    }

    public function show(){

        $query = Band::orderBy('rate', $this->sort)
            ->search($this->search);


            if($this->Pop == 'Pop' || $this->Reggae == 'Reggae' || $this->Rock == 'Rock' || $this->Acoustic == 'Acoustic' || $this->Classical == 'Classical'){
                $query->where('genre', $this->Pop)
                    ->orWhere('genre', $this->Reggae)
                    ->orWhere('genre', $this->Rock)
                    ->orWhere('genre', $this->Acoustic)
                    ->orWhere('genre', $this->Classical);
            }
            if($this->Reggae == 'Reggae' ){
                $query->where('genre', $this->Reggae);
            }
            if($this->Rock == 'Rock' ){
                $query->where('genre',$this->Rock);
            }

            if($this->Acoustic == 'Acoustic' ){
                $query->where('genre', $this->Acoustic);
            }
            if($this->Pop == 'Pop' ){
                $query->where('genre',$this->Pop);
            }
            if($this->Classical == 'Classical' ){
                $query->where('genre', $this->Classical);
            }

        if($this->Rate){
            $query->where('rate', '>=', $this->Rate);
        }

        if($this->Location != 'all'){
            $query->where('location', $this->Location);
        }

        $music = $query->paginate(6);
        return compact('music');
    }
    // public $band, $location, $rate, $contact, $history, $image, $genre = [''];
    public function resetFilters(){
        $this->band = "";
        $this->location = "";
        $this->rate = "";
        $this->contact = "";
        $this->history = "";
        $this->image = "";
        $this->genre = "";

        $this->reset('search', 'Pop', 'Classical', 'Acoustic', 'Reggae', 'Rock', 'Rate', 'sort', 'Location');
    }
    public function render(){
        $music = Band::where('band', 'like', '%'.$this->search.'%')
                    ->orWhere('location', 'like', '%'.$this->search.'%')
                    ->orWhere('contact', 'like', '%'.$this->search.'%')
                    ->orWhere('rate', 'like', '%'.$this->search.'%')
                    ->orWhere('genre', 'like', '%'.$this->search.'%')->get();
        return view('livewire.home', $this->show(), ['music' => $music] );
    }
}
