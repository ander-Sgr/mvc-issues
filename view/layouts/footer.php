<footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"> </script>
    <script>
        $(document).ready(function() {
            $('<?= $incidencia ?>').DataTable();
            $('<?= $incidencia2 ?>').DataTable();
        });
    </script>
</footer>

</html>