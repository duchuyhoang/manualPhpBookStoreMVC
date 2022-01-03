<h2>Password</h2>

<div class="d-flex">
    <div class="col-12">
        <div class="form-group">
            <label for="currentPassword">Current password<span class="text-danger ml-1">*</span></label>
            <input type="password" class="baseInput" id="currentPassword" placeholder="Current password">
        </div>
    </div>
</div>

<div class="d-flex">
    <div class="col-6">
        <div class="form-group">
            <label for="newPassword">New password<span class="text-danger ml-1">*</span></label>
            <input type="password" class="baseInput" id="newPassword" placeholder="New password">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="confirmPassword">Confirm password<span class="text-danger ml-1">*</span></label>
            <input type="password" class="baseInput" id="confirmPassword" placeholder="Confirm password">
        </div>

    </div>

</div>

<button class="blackButton ml-3" id="editPassword" value="<?php echo $EDIT_USER_PASSWORD; ?>">Save changes</button>

<script>
    $("#editPassword").click(function(event) {
        $("#saveChangeAddress").click(function(event) {
            $("#loading").addClass("loadingShow");

            request = $.ajax({
                url: "./ajax/user.php",
                type: "post",
                data: {
                    submit: $("#editPassword").attr("value"),
                    currentPassword:$("#currentPassword").val(),
                    newPassword: $("#newPassword").val(),
                }
            });

            request.done(function(response, textStatus, jqXHR) {
                $("#loading").removeClass("loadingShow");
                $.snackbar({
                    content: "Edit success!!!",
                    timeout: 5000,
                    style: "customSnackbar snackbar-success"
                });
                window.location.reload();
            });


            request.fail(function(jqXHR, textStatus, errorThrown) {
                const response = JSON.parse(jqXHR.responseText)
                $("#loading").removeClass("loadingShow");
                $.snackbar({
                    content: response.message || "Something wrong",
                    timeout: 5000,
                    style: "customSnackbar snackbar-error"
                });


            });


        })
    })
</script>