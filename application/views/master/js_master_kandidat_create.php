<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kandidat_visi').summernote(
            {
                height: 150
            }
        );
        
        $('#kandidat_misi').summernote(
            {
                height: 300
            }
        );

        $('#kandidat_program').summernote(
            {
                height: 300
            }
        );

        $('#kandidat_lain').summernote(
            {
                height: 300
            }
        );
    });
</script>