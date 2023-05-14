<x-master>
<form action="{{route('update',$pr->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title">nom d'article</label>
      @error('nom')
          {{ $message }}
      @enderror
      <input type="text" class="form-control"  id="title" name="nom" value={{$pr->nom}}>
    </div>
    <div class="form-group">
      <label for="content">prix l'article</label>
      @error('prix')
          {{ $message }}
      @enderror
      <input class="form-control" id="content" name="prix" value={{$pr->prix}}>
    </div>
    <div class="form-group">
      <label for="content">Quantite</label>
      @error('quantite')
          {{ $message }}
      @enderror
      <input class="form-control" id="content" name="quantite" value={{$pr->quantite}}>
    </div>
    <div class="form-group">
      <img class="img-fluid w-50" src="{{asset('images/'.$pr->image)}}"/>
      <input type="file" name="image" value="{{$pr->image}}"/>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>
</x-master>