<h2>Your address</h2>

<div class="d-flex mt-5 flex-wrap">
    <div class="col-12">
        <div class="form-group">
            <label for="userCity">Your city<span class="text-danger ml-1">*</span></label>
            <select class="select p-0" id="userCity" selected="">
                <option value="-1">Select a city</option>
                <?php
                foreach ($listCity as $city) {
                    echo " <option value={$city->getId_city()}>{$city->getCity_name()}</option>";
                }

                ?>

            </select>
        </div>
    </div>
    <div class="col-12">
        <label for="userDistrict">Your district<span class="text-danger ml-1">*</span></label>
        <select class="select p-0" id="userDistrict">
            <option value="-1">Select a district</option>
            <?php
            foreach ($listDistrict as $district) {
                echo " <option value={$district->getId_district()}>{$city->getDistrict_name()}</option>";
            }
            ?>
            <select>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="userWard">Your ward<span class="text-danger ml-1">*</span></label>
            <select class="select p-0" id="userWard">
                <option value="-1">Select a ward</option>
                <?php
                foreach ($listWard as $ward) {
                    echo " <option value={$ward->getId_ward()}>{$ward->getWard_name()}</option>";
                }
                ?>
                <select>
        </div>
    </div>

    <button class="blackButton ml-3" id="saveChangeAddress" value="<?php echo $EDIT_USER_ADDRESS ?>">Save changes</button>


</div>


<script>
    let listCity = JSON.parse(JSON.stringify(<?php echo $listCityJson; ?>));
    let listDistrict = JSON.parse(JSON.stringify(<?php echo $listDistrict; ?>));
    let listWard = JSON.parse(JSON.stringify(<?php echo $listWard; ?>));
    const selectizeSetting = {
        create: true,
        sortField: "text",
        showAddOptionOnCreate: false
    };
    let $userCitySelect, $userDistrictSelect, $userWardSelect = null;
</script>
<script>
    $(document).ready(function() {
        $userCitySelect = $("#userCity").selectize({
            selectizeSetting,
            onChange: (value) => {
                $userDistrictSelect[0].selectize.clear();
                $userDistrictSelect[0].selectize.clearOptions();


                if (value != -1 && value != "") {
                    $userDistrictSelect[0].selectize.addOption({
                        text: "Select a district",
                        value: -1
                    })
                    $userDistrictSelect[0].selectize.setValue(-1, 0);
                    listDistrict.filter((district) => district.province_id == value).map((district) => {
                        $userDistrictSelect[0].selectize.addOption({
                            text: district.district_name,
                            value: district.id_district
                        })
                    })
                }

            }
        });

        $userDistrictSelect = $("#userDistrict").selectize({
            selectizeSetting,
            onChange: (value) => {

                $userWardSelect[0].selectize.clear();
                $userWardSelect[0].selectize.clearOptions();

                // $userWardSelect[0].selectize.addOption({
                //     text: "Select a ward",
                //     value: -1
                // })
                // $userWardSelect[0].selectize.seValue(-1, 0);

                if (value != -1 && value != "") {

                    listWard.map((ward) => {
                        if (ward.id_district == value)
                            $userWardSelect[0].selectize.addOption({
                                text: ward.ward_name,
                                value: ward.id_ward
                            })
                    })
                }
            }
        })

        $userWardSelect = $("#userWard").selectize({
            ...selectizeSetting
        })
        // console.log($userCitySelect[0].setValue());

        const userAddress = <?php echo json_encode($_SESSION[$CURRENT_USER_INFO]->getAddress());  ?>

        if (userAddress) {
            $userCitySelect[0].selectize.setValue(userAddress.id_province);
            $userDistrictSelect[0].selectize.setValue(userAddress.id_district);
            $userWardSelect[0].selectize.setValue(userAddress.id_ward);
        }

    })
</script>
<script>
    $("#saveChangeAddress").click(function(event) {
        $("#loading").addClass("loadingShow");

        request = $.ajax({
            url: "./ajax/user.php",
            type: "post",
            data: {
                submit: $("#saveChangeAddress").attr("value"),
                newCity: $userCitySelect[0].selectize.getValue(),
                newDistrict: $userDistrictSelect[0].selectize.getValue(),
                newWard: $userWardSelect[0].selectize.getValue()
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
</script>