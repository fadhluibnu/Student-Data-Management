<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="/js/script.js"></script>
@if (Request::is('/'))
    <script src="/js/overview.js"></script>
@endif
@if (Request::is('dataguru/*'))
    <script src="/js/data-guru.js"></script>
@endif
