<script src="<?php echo base_url('assets/plugin/') ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/plugin/') ?>datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugin/') ?>datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/plugin/') ?>datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true
        });        
    });
</script>