<h2>Account detail</h2>
<div class="d-flex">
    <div class="col-6">
        <div class="form-group">
            <label for="userFirstName">First name<span class="text-danger ml-1">*</span></label>
            <input type="text" class="baseInput" id="userFirstName" placeholder="" value="<?php echo explode(" ", $_SESSION[$CURRENT_USER_INFO]->getName())[0] ?>">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="userLastName">Last name<span class="text-danger ml-1">*</span></label>
            <input type="text" class="baseInput" id="userLastName" placeholder="" value="<?php echo count(explode(" ", $_SESSION[$CURRENT_USER_INFO]->getName())) > 1 ?  explode(" ", $_SESSION[$CURRENT_USER_INFO]->getName())[count(explode(" ", $_SESSION[$CURRENT_USER_INFO]->getName())) - 1] : "" ?>">
        </div>
    </div>




</div>
<div class="d-flex">
    <div class="col-6">
        <div class="form-group">
            <label for="userPhone">Phone<span class="text-danger ml-1">*</span></label>
            <input type="text" class="baseInput" id="userPhone" placeholder="" value="<?php echo $_SESSION[$CURRENT_USER_INFO]->getPhone() ?>">
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="userBirthday">Birthday<span class="text-danger ml-1">*</span></label>
            <input type="date" class="baseInput" id="userBirthday" placeholder="" value="<?php echo $_SESSION[$CURRENT_USER_INFO]->getBirthday() ? $_SESSION[$CURRENT_USER_INFO]->getBirthday()->format("Y-m-d") : "" ?>">
        </div>
    </div>

</div>

<div class="d-flex">
    <div class="col-12">
        <div class="form-group">
            <label for="userSelfDecribe">Self describe</label>

            <textarea class="form-control" id="userSelfDecribe">
            <?php echo trim($_SESSION[$CURRENT_USER_INFO]->getSelf_describe()); ?>
            </textarea>
        </div>
    </div>

</div>

<div class="d-flex">
    <div class="col-12">
        <div class="form-group">
            <label for="newAvatar">Avatar</label>

            <input type="file" id="newAvatar" accept="image/*">
        </div>

    </div>
</div>

<button class="blackButton ml-3" id="saveEditedUserInfo" value="<?php echo $EDIT_USER ?>">Save changes</button>

<script>
    $("#saveEditedUserInfo").click(function(event) {
        const fileList = $("#newAvatar")[0].files
        const id_user = <?php echo $_SESSION[$CURRENT_USER_INFO]->getId() ?>;
        const data = new FormData();
        const avatar = "<?php echo $_SESSION[$CURRENT_USER_INFO]->getAvatar(); ?>"

        $("#loading").addClass("loadingShow");

        if (fileList.length > 0) {
            data.append("newAvatar", fileList["0"]);
        }

        data.append("submit", $("#saveEditedUserInfo").attr("value"));
        data.append("name", $("#userFirstName").val() + " " + $("#userLastName").val());
        data.append("phone", $("#userPhone").val());
        data.append("self_describe", $("#userSelfDecribe").val());
        data.append("birthday", $("#userBirthday").val());
        data.append("id_user", id_user);
        data.append("avatar", avatar);




        request = $.ajax({
            url: "./ajax/user.php",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
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
            console.log(jqXHR);
            const response = JSON.parse(jqXHR.responseText)
            $("#loading").removeClass("loadingShow");
            $.snackbar({
                content: response.message || "Something wrong",
                timeout: 5000,
                style: "customSnackbar snackbar-error"
            });
            

        });






    })
</script>