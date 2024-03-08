<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Sawah;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Spatie\Geocoder\Geocoder;
use Manny;

class Sawahs extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $perPage=5;
    public $selectPage = false;
    public $checked = [];
    public $search='';
    public $mode='read';
    public $ids,$nosawah,$namasawah,$luas,$lokasi,$latlang,$b_barat,$b_utara,$b_timur,$b_selatan,$namapenjual,$hargabeli,$tglbeli,$namapembeli,$hargajual,$tgljual,$nop,$nilaipajak,$img,$user_id;
    public $oldpath,$newpath,$tmpimg;
    public $filename="Choose File";
    public $p1,$l1,$p2,$l2,$la,$m,$ls1,$ls2,$ls3,$ls4,$lanjakw,$lanjarp;
    public $cluas,$cbata,$clanjakw,$clanjarp;
    public $hgpadi="750000";
    public $lanja="5";
    public $conhgpadi="750000";
    public $conlanja="5";
    public $modecal="htluas";
    public $autocomplate;
    protected $listeners = [
        'delsawahselect',
        'onDelForceProses',
        'getLatlangInput',
    ];
    public $lt,$lg;
    public function mount(){
        $this->resetKonversi();
        $this->resetForm();
        $this->resetKalkulator();
    }

    //jangan gunakan variabel dengan nama rules dan messages 
    
    //awal get lokasi
    public $map_id = 0;

    public function getLatlangInput($data)
    {
        if($data['lat']==0 || $data['long']==0){
            $this->latlang='';
            $this->lt=0;
            $this->lg=0;
        }else{
            $this->latlang=$data['lat'].','.$data['long'];
            $this->lt=$data['lat'];
            $this->lg=$data['long'];
        }
   
        if(empty($data['lokasi'])){
            $geocoder=$this->onGetGeocoder($data['lat'],$data['long']);
            if($geocoder !== 'result_not_found'){
                $this->lokasi=  $geocoder ;
            }else{
                $this->lokasi=  '' ;
                if($this->mode=='edit'){
                    $this->dispatchBrowserEvent('editgetaddress',[
                        'map_id' => $this->map_id,
                        'lt' => 0,
                        'lg' => 0,
                        'kordinat' => '',
                    ]);
                }else{
                    $this->dispatchBrowserEvent('getaddress',[
                        'map_id' => $this->map_id,
                        'lt' => 0,
                        'lg' => 0,
                        'kordinat' => '',
                    ]);
                }
 
            }    
        }else{
            $this->lokasi=$data['lokasi'];
            $this->map_id++;
            if($this->mode=='edit'){
                $this->dispatchBrowserEvent('editgetaddress',[
                    'map_id' => $this->map_id,
                    'lt' => $data['lat'],
                    'lg' => $data['long'],
                    'kordinat' => $this->latlang,
                ]);
            }else{
                $this->dispatchBrowserEvent('getaddress',[
                    'map_id' => $this->map_id,
                    'lt' => $data['lat'],
                    'lg' => $data['long'],
                    'kordinat' => $this->latlang,
                ]);
            }
        }
    }

    public function onGetlokasi(){
        $this->map_id++;
        $this->dispatchBrowserEvent('getLocation',['map_id' => $this->map_id]);
    }

    public function onGetAdress($q){
        $this->map_id++;
        if($q=='add'){
            $this->dispatchBrowserEvent('getaddress',['map_id' => $this->map_id]);
        }else{
            $this->dispatchBrowserEvent('editgetaddress',['map_id' => $this->map_id]);
        }
        
    }

    public function editGetlokasi(){
        $this->map_id++;
        $this->dispatchBrowserEvent('editgetLocation',['map_id' => $this->map_id]);
    }

    private function show_location($kordinat){
        //location
        if(!empty($kordinat)){
            $data=explode("," , $kordinat);
        }else{
            $data[0]=0;
            $data[1]=0;
        }
        $this->dispatchBrowserEvent('showLocation',[
            'map_id' => $this->map_id,
            'nlat' => $data[0],
            'nlong' => $data[1],
            'kordinat' => $kordinat,
        ]);
    }

    public function onGetGeocoder($lat,$lng){
        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));
        $g=collect($geocoder->getAddressForCoordinates($lat,$lng));
        $lokasi= $g->get('formatted_address');
        return $lokasi;
    }

    //akhir get lokasi

     // Batas Awal Fungsi Tabel
    public function getSawahProperty(){
        $searchQuery = trim($this->search);
        $requestData = ['nosawah','namasawah','luas','lokasi'];
        return Sawah::where(function($q) use($requestData, $searchQuery) {
            foreach ($requestData as $field)
               $q->orWhere($field, 'like', "%{$searchQuery}%");
        })->where('user_id',Auth::user()->id)->paginate($this->perPage,['*'], 'sawahPage');

        //return Info::where('title','like','%'.$this->search.'%')->paginate($this->perPage,['*'], 'infoPage');
    }
    public function updatedSelectPage($value){
        if($value){
            $this->checked = $this->Sawah->pluck('id')->toArray();
        }else{
            $this->checked = [];
        }
    }
    public function updatedChecked($value){
        $this->selectPage=false;
    }
    public function is_checked($id){
        return in_array($id,$this->checked);
    }

    public function render()
    {
        //dd(Carbon::today()->toDateString());
        $data = [
            'Sawah'=>$this->Sawah,
            'Restoresawah'=>$this->Restoresawah,
        ];
        return view('livewire.backend.sawahs',$data)->extends('layouts.app');
    }
    // Batas Akhir Fungsi Tabel

    // Batas Awal Fungsi Kalkulator Sawah
    public function onHtluas(){
        $this->modecal="htluas";
    }
    public function updatedP1($value){
        $this->kalkulatorsawah();
    }
    public function updatedL1($value){
        $this->kalkulatorsawah();
    }
    public function updatedP2($value){
        $this->kalkulatorsawah();
    }
    public function updatedL2($value){
        $this->kalkulatorsawah();
    }
    public function updatedLa($value){
            $this->m=get_sisiMsegi3($this->p1,$this->l2,$this->la); 
            $this->kalkulatorsawah();
    }
    public function updatedM($value){
        $this->kalkulatorsawah();
    }
    public function updatedHgpadi($value){
        $this->kalkulatorsawah();
    }
    public function updatedLanja($value){
        $this->kalkulatorsawah();
    }
    public function resetKalkulator(){
        $this->p1=0;
        $this->l1=0;
        $this->p2=0;
        $this->l2=0;
        $this->la=0;
        $this->m=0;
        $this->hgpadi=get_floatttorp(get_hargapadi());
        $this->lanja=get_nilailanja();
        $this->ls1=get_conluas(0);
        $this->ls2=get_conluas(0);
        $this->ls3=get_convtobata(0);
        $this->ls4=get_convtobata(0);
        $this->lanjakw= get_lanja(0,$this->lanja);
        $this->lanjarp= get_nlanja(0,$this->lanja,$this->hgpadi);
    }
    public function kalkulatorsawah(){
        $this->validate(
        [ 
            'p1' => 'numeric|nullable',
            'l1' => 'numeric|nullable',
            'p2' => 'numeric|nullable',
            'l2' => 'numeric|nullable',
            'la' => 'numeric|nullable',
            'm' => 'numeric|nullable',
            'hgpadi' => 'required',
            'lanja' => 'required|numeric',
        ]);
        $p1=$this->p1;
        $l1=$this->l1;
        $p2=$this->p2;
        $l2=$this->l2;
        $la=$this->la;
        $m=$this->m;
        $hgpadi=Manny::stripper($this->hgpadi,['num']);
        $lanja=$this->lanja;
        if(empty($p2)||empty($l2)){
            $p1=floatval($p1);
            $l1=floatval($l1);
            $ls1=get_Nconluas($p1*$l1);
            $this->ls1=get_conluas($p1*$l1);
            $this->ls2=get_conluas($p1*$l1);
            $this->ls3=get_convtobata($p1*$l1);
            $this->ls4=get_convtobata($p1*$l1);
            $this->lanjakw= get_lanja($ls1,$lanja);
            $this->lanjarp= get_nlanja($ls1,$lanja,$hgpadi);
        }elseif(!empty($m)){
            $ls1=get_luassegi4($p1,$l1,$p2,$l2,$m);
            $ls2=get_luassegi4($p1,$l1,$p2,$l2,$m);
            $this->ls1=get_conluas($ls1);
            $this->ls2=get_conluas($ls2);
            $this->ls3= get_convtobata($ls1);
            $this->ls4= get_convtobata($ls2);
            $this->lanjakw= get_lanja($ls1,$lanja);
            $this->lanjarp= get_nlanja($ls1,$lanja,$hgpadi);
        }else{
            $ls1=get_luaspersegi($p1,$l1,$p2,$l2);
            $this->ls1=get_conluas($ls1);
            $this->ls2="";
            $this->ls3= get_convtobata($ls1);
            $this->ls4="";
            $this->lanjakw= get_lanja($ls1,$lanja);
            $this->lanjarp= get_nlanja($ls1,$lanja,$hgpadi);
        }

    }
    // Batas Akhir Fungsi Kalkulator Sawah

    // Batas Awal Fungsi Konversi Sawah
    public function onCbata(){
        $this->modecal="htconv";
    }
    public function updatedCluas($value){
        $this->cbata= get_Nconvtobata($this->cluas);
        $this->konversisawah();
    }
    public function updatedCbata($value){
        $this->cluas= get_NBatatoluas($this->cbata);
        $this->konversisawah();
    }
    public function updatedConhgpadi($value){
        //dd($value);
        $this->konversisawah();
    }
    public function updatedConlanja($value){
        //dd($value);
        $this->konversisawah();
    }
    public function resetKonversi(){
        $this->cluas=0;
        $this->cbata=0;
        $this->conhgpadi=get_floatttorp(get_hargapadi());
        $this->conlanja=get_nilailanja();
        $this->clanjakw=get_lanja($this->cluas,$this->conlanja);
        $this->clanjarp=get_nlanja($this->cluas,$this->conlanja,$this->conhgpadi);
    } 
    public function konversisawah(){
        $this->validate(
            [ 
                'cluas' => 'numeric|nullable',
                'cbata' => 'numeric|nullable',
                'conhgpadi' => 'required',
                'conlanja' => 'required|numeric',
            ]);
        
        $cluas=$this->cluas;
        $cbata=$this->cbata;
        $conhgpadi=Manny::stripper($this->conhgpadi,['num']);
        $conlanja=$this->conlanja;
        $this->clanjakw= get_lanja($cluas,$conlanja);
        $this->clanjarp= get_nlanja($cluas,$conlanja,$conhgpadi);
    }

    public function onRead(){
        $this->mode='read';
        $this->resetForm();
    }

    public function onEdit($id){
        $this->dispatchBrowserEvent('runCurrencyScript');
        $this->onGetAdress('edit');
        $this->mode='edit';
        $this->ids=$id;
        $sawah = Sawah::findOrFail($id);
        $this->nosawah=$sawah->nosawah;
        $this->namasawah=$sawah->namasawah;
        $this->luas=$sawah->luas;
        $this->lokasi=$sawah->lokasi;
        $this->latlang=$sawah->latlang;
        $this->b_barat=$sawah->b_barat;
        $this->b_utara=$sawah->b_utara;
        $this->b_timur=$sawah->b_timur;
        $this->b_selatan=$sawah->b_selatan;
        $this->namapenjual=$sawah->namapenjual;
        $this->hargabeli=get_floatttorp($sawah->hargabeli);
        $this->tglbeli=Carbon::parse($sawah->tglbeli)->format("d-m-Y");
        $this->namapembeli=$sawah->namapembeli;
        $this->hargajual=get_floatttorp($sawah->hargajual);
        $this->tgljual=Carbon::parse($sawah->tgljual)->format("d-m-Y");
        $this->nop=$sawah->nop;
        $this->nilaipajak=$sawah->nilaipajak;
        $this->img=$sawah->img;
        $this->tmpimg=$sawah->img;
        $this->show_location($this->latlang);
        
    }



    private function resetForm(){
        $this->kordinat='';
        $this->ids='';
        $this->nosawah='';
        $this->namasawah='';
        $this->luas='0';
        $this->lokasi='';
        $this->latlang='';
        $this->b_barat='';
        $this->b_utara='';
        $this->b_timur='';
        $this->b_selatan='';
        $this->namapenjual='';
        $this->hargabeli='0';
        $this->tglbeli='';
        $this->namapembeli='';
        $this->hargajual='0';
        $this->tgljual='';
        $this->nop='';
        $this->nilaipajak='0';
        $this->img=null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedImg($value){
        if($value){
            $this->filename=$value->getClientOriginalName();
        }else{
            $this->filename="Choose File";
        }
    }

    public function editsawah(){
        $this->validate(
            [ 
                'nosawah' => 'required|string',
                'namasawah' => 'required|string',
                'luas' => 'required|numeric',
                'lokasi' => 'required|string',
                'latlang' => 'nullable|string',
                'b_barat' => 'nullable|string',
                'b_utara' => 'nullable|string',
                'b_timur' => 'nullable|string',
                'b_selatan' => 'nullable|string',
                'namapenjual' => 'nullable|string',
                'hargabeli' => 'nullable',
                'tglbeli' => 'nullable|date',
                'namapembeli' => 'nullable|string',
                'hargajual' => 'nullable',
                'tgljual' => 'nullable|date',
                'nop' => 'nullable|string',
                'nilaipajak' => 'nullable|numeric',
                'img' => 'nullable|image|max:1024',
            ]);
        if(empty($this->hargabeli)){
            $this->hargabeli='0';
        }
        if(empty($this->hargajual)){
            $this->hargajual='0';
        }
        $dir='photosawah'; 
        if(!empty($this->img)){
            $this->hapusfile($this->ids);
            $this->newpath=$this->img->store($dir,'public');
        }else{
            $this->newpath=Sawah::findOrFail($this->ids)->img;
        }  
        $info=Sawah::updateOrCreate(['id' => $this->ids], [
            'nosawah' => $this->nosawah,
            'namasawah' => $this->namasawah,
            'luas' => $this->luas,
            'lokasi' => $this->lokasi,
            'latlang' => $this->latlang,
            'b_barat' => $this->b_barat,
            'b_utara' => $this->b_utara,
            'b_timur' => $this->b_timur,
            'b_selatan' => $this->b_selatan,
            'namapenjual' => $this->namapenjual,
            'hargabeli' => Manny::stripper($this->hargabeli,['num']),
            'tglbeli' => Carbon::parse($this->tglbeli)->format("Y-m-d"),
            'namapembeli' => $this->namapembeli,
            'hargajual' => Manny::stripper($this->hargajual,['num']),
            'tgljual' => Carbon::parse($this->tgljual)->format("Y-m-d"),
            'nop' => $this->nop,
            'nilaipajak' => $this->nilaipajak,
            'img' => $this->newpath,
            'user_id' => Auth::user()->id
        ]);
        //flash message
        $this->alert('success', 'Sawah berhasil diupdate');
        //session()->flash('success', 'Sawah berhasil diupdate');
        //redirect
        return redirect()->route('sawahs');
    }

    public function onAdd(){
        //dd($this->kordinat);
        $this->dispatchBrowserEvent('runCurrencyScript');
        $this->mode='add';
        $this->onGetAdress('add');
        $this->resetForm();
    }

    public function addsawah(){
        $this->validate(
            [ 
                'nosawah' => 'required|string',
                'namasawah' => 'required|string',
                'luas' => 'required|numeric',
                'lokasi' => 'required|string',
                'latlang' => 'nullable|string',
                'b_barat' => 'nullable|string',
                'b_utara' => 'nullable|string',
                'b_timur' => 'nullable|string',
                'b_selatan' => 'nullable|string',
                'namapenjual' => 'nullable|string',
                'hargabeli' => 'nullable',
                'tglbeli' => 'nullable|date',
                'namapembeli' => 'nullable|string',
                'hargajual' => 'nullable',
                'tgljual' => 'nullable|date',
                'nop' => 'nullable|string',
                'nilaipajak' => 'nullable|numeric',
                'img' => 'nullable|image|max:1024',
            ]);
        if(empty($this->hargabeli)){
            $this->hargabeli='0';
        }
        if(empty($this->hargajual)){
            $this->hargajual='0';
        }
        $dir='photosawah'; 
        if(!empty($this->img)){
            $this->newpath=$this->img->store($dir,'public');
        }else{
            $this->newpath='';
        }  
        $info=Sawah::updateOrCreate(['id' => $this->ids], [
            'nosawah' => $this->nosawah,
            'namasawah' => $this->namasawah,
            'luas' => $this->luas,
            'lokasi' => $this->lokasi,
            'latlang' => $this->latlang,
            'b_barat' => $this->b_barat,
            'b_utara' => $this->b_utara,
            'b_timur' => $this->b_timur,
            'b_selatan' => $this->b_selatan,
            'namapenjual' => $this->namapenjual,
            'hargabeli' => Manny::stripper($this->hargabeli,['num']),
            'tglbeli' => Carbon::parse($this->tglbeli)->format("Y-m-d"),
            'namapembeli' => $this->namapembeli,
            'hargajual' => Manny::stripper($this->hargajual,['num']),
            'tgljual' => Carbon::parse($this->tgljual)->format("Y-m-d"),
            'nop' => $this->nop,
            'nilaipajak' => $this->nilaipajak,
            'img' => $this->newpath,
            'user_id' => Auth::user()->id
        ]);
        //flash message
        $this->alert('success', 'Sawah berhasil ditambahkan');
        //session()->flash('success', 'Sawah berhasil ditambahkan');
        //redirect
        return redirect()->route('sawahs');
    }

    public function onDelete($id){
        $this->ids=$id;
        Sawah::findOrFail($this->ids)->delete();
        //reset form
        $this->resetForm();
        //flash message
        $this->alert('success', 'Sawah berhasil dihapus');
        //session()->flash('success', 'Sawah berhasil dihapus');
        //redirect
        return redirect()->route('sawahs');
    }

    private function deletefile($pathfile){
        if(Storage::disk('public')->exists($pathfile)){
            Storage::disk('public')->delete($pathfile);
        }
    }

    private function hapusfile($id){
        //dd($id);
        $this->oldpath = Sawah::findOrFail($id)->img;
        $dir='photosawah'; 
        if(!empty($this->oldpath)){
            $this->deletefile($this->oldpath);
        }
    }

    private function hapusfileDel($id){
        //dd($id);
        $this->oldpath = Sawah::onlyTrashed()->findOrFail($id)->img;
        $dir='photosawah'; 
        if(!empty($this->oldpath)){
            $this->deletefile($this->oldpath);
        }
    }

    public function getRestoresawahProperty()
    {
        return Sawah::onlyTrashed()->where('user_id',Auth::user()->id)->orderBy('deleted_at', 'DESC')->paginate($this->perPage,['*'], 'sawahtrashPage');
    }
    public function onTrashed(){
        $this->mode='trashed';
    }

    public function onResDel($id){
        //dd('restore= '.$id);
        Sawah::where('id',$id)->withTrashed()->restore();
        //reset form
        $this->resetForm();
        //flash message
        //session()->now('success', 'Sawah berhasil direstore');
        $this->alert('success', 'Sawah berhasil direstore');
        //return redirect()->route('sawahs');
    }
    
    
    public function onDelForce($id){
        $this->ids=$id;
        $sawah = Sawah::whereIn('id',[$id]);
        $this->confirm("Apakah anda yakin ingin hapus permanen ?<p class='text-danger font-weight-bold'>".$sawah->pluck('namasawah')->implode(',<br>')."</p>", 
        [
            'onConfirmed' => 'onDelForceProses'
        ]);
    }

    public function onDelForceProses(){
        //dd('delforce= '.$id);
        //dd($this->ids);
        $this->hapusfileDel($this->ids);
        Sawah::where('id',$this->ids)->withTrashed()->forceDelete();
        //reset form
        $this->resetForm();
        //flash message
        //session()->flash('success', 'Sawah berhasil dihapus permanen');
        $this->alert('success', 'Sawah berhasil dihapus permanen');
        //return redirect()->route('sawahs');
    }

    public function onDelSelect(){
        Sawah::whereIn('id',$this->checked)->delete();
        $this->resetForm();
        $this->alert('success', 'Sawah berhasil dihapus');
        //session()->flash('success', 'Sawah berhasil dihapus');
        return redirect()->route('sawahs');
    }


}
