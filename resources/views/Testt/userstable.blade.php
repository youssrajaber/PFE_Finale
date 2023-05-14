@props(['lang', "esm","asel"])
<div>
    <h1>{{$esm}}--{{$asel}}</h1>

@empty($lang)
pas de lang 
@else
<table class="table" border="2" width='50%'>
    <tr>
        <th>Langages</th>
    </tr>
    @foreach ($lang as $elm )
    <tr>
        <td>{{$elm}}</td>
    </tr>
    @endforeach
</table>
@endempty
</div>