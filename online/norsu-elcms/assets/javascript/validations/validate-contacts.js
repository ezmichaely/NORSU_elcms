$(document).ready(function () {
    // ADD CONTACTS
    $("#AddContactForm").on('submit', function (e) {
        e.preventDefault();
        var formData = $('#AddContactForm').serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url: baseUrl + '/app/controllers/crud/crudContacts.php',
            data: formData + '&AddContact=AddContact',
            dataType: 'JSON',
            success: function (feedback) {
                if (feedback.status === 'success') {
                    location.href = baseUrl + "/" + (feedback.directory) + "/profile.php?u=" + (feedback.u);
                }
            }
        });
    });



});