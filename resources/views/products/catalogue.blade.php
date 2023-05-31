<div>
    <div style="padding:3rem">
        <h3 style="text-align: center;margin-buttom:1rem;font-weight:bold;margin-bottom:3rem;">
            Summary</h3>
        <hr style="margin-bottom: 2rem;margin-top:2rem;">
        <h5 style="font-size: 2rem;">Products</h5>
        @foreach ($products as $prd)
            <div style="display: flex;">
                <div>{{ $prd->nom }} {{ $prd->quantite }} x
                    {{ $prd->prix }}DH</div>
            </div>
        @endforeach
        <hr style="margin-bottom: 2rem;margin-top:2rem;">
        <div style=" margin-bottom :3rem;">
            <h5 style="font-size: 2rem;">Total price : {{ $total }} DH</h5>
        </div>
    </div>
</div>
