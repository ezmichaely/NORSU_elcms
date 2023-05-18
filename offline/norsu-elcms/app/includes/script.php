<!-- JAVASCRIPTS -->
<!-- jquery -->
<script>
const baseUrl = "<?php echo BASE_URL; ?>";
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script src="<?php echo (BASE_URL . '/assets/vendor/jquery-3.6.0/jquery-3.6.0.min.js') ?>"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<?php if(in_array('datatables', $pagehas)):  ?>
<!-- datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap5.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script> -->
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script src="<?php echo (BASE_URL . '/assets/vendor/selectize/selectize.min.js') ?>"></script>

<!-- bootstrap -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script> -->
<script src="<?php echo (BASE_URL . '/assets/vendor/bootstrap/bootstrap.bundle.js') ?>"></script>


<?php if(in_array('ckeditor', $pagehas)):  ?>
<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script> -->
<?php endif; ?>

<?php if(in_array('croppie', $pagehas)):  ?>
<!-- croppie -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"
    integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php endif; ?>


<!-- local -->
<script src="<?php echo (BASE_URL . '/assets/javascript/dom.js') ?>"></script>
<script src="<?php echo (BASE_URL . '/assets/javascript/function.js') ?>"></script>

<?php if(in_array('manage', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-manage.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('authentication', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-accounts.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('posts', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-posts.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('announcements', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-announcements.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('modules', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-modules.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('class', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-class.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('assessments', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-assessments.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('contacts', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-contacts.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('messages', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-messages.js') ?>"></script>
<?php endif; ?>

<?php if(in_array('requests', $pagehas)): ?>
<script src="<?php echo (BASE_URL . '/assets/javascript/validations/validate-requests.js') ?>"></script>
<?php endif; ?>
