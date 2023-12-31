@props(['type'])

<div id="alertMessage" class="alert alert-dark alert-dismissible fade show" role="alert"
    style="position: absolute; top:15%; right:2%; background-color: #212529 ; border: 1px solid #212529 ; color: white">
    {{ $slot }}
    <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<script>
    let MyElement = document.getElementById('alertMessage');
    setTimeout(() => {
        MyElement.classList.add('d-none');
    }, 4000);
</script>
