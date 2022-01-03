<div id=<?php echo $ADD_PRODUCT ?> class="<?php echo $tab == "" || $tab == $ADD_PRODUCT ? "active" : "" ?>">
    <h3>Add product</h3>
    <section class="mt-3 justify-content-center flex-column align-items-center">
        <form id="addBookForm">

            <div class="d-flex">

                <div class="col-6">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookName">Book name</label>
                        <input type="text" class="baseInput" placeholder="Enter book name..." id="newBookName">
                    </div>
                </div>


                <div class="col-6">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookQuantity">Book quantity</label>
                        <input type="number" id="newBookQuantity" class="baseInput" placeholder="Book quantity..." min="1" step="1" onkeypress="return event.charCode >= 48">
                    </div>
                </div>

            </div>

            <div class="d-flex">
                <div class="col-12">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookPrice">Book price</label>
                        <input type="number" id="newBookPrice" class="baseInput" placeholder="Book price..." min="1" step="1" onkeypress="return event.charCode >= 48">
                    </div>
                </div>
            </div>


            <div class="d-flex">
                <div class="col-6">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookAuthor">Author</label>
                        <select class="select p-0" id="newBookAuthor">
                            <?php
                            foreach ($ListAuthor as $author) {
                                echo "<option value={$author->getId_author()}>{$author->getName()}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookManufacture">Manufacture</label>
                        <select class="select p-0" id="newBookManufacture">
                            <?php
                            foreach ($ListManufacture as $manufacture) {
                                echo "<option value={$manufacture->getId_manufacture()}>{$manufacture->getName()}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="d-flex">
                <div class="col-12">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookCategory">Category</label>
                        <select class="select p-0" id="newBookCategory">
                            <?php
                            foreach ($ListCategory as $category) {
                                echo "<option value={$category->getId_category()}>{$category->getCat_name()}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <div class="col-12">

                    <div class="mt-1 w-100 form-group">
                        <label for="newBookDescription">Description</label>
                        <textarea class="baseInput" id="newBookDescription"></textarea>
                    </div>
                </div>
            </div>


            <div class="d-flex">
                <div class="col-12">
                    <div class="mt-1 w-100 form-group">
                        <label for="newBookImage">Images</label>
                        <input type="file" accept="image/*" id="newBookImage" multiple />

                    </div>
                </div>
            </div>



            <div class="w-100 text-center">
                <button type="button" id="addNewProduct" value='<?php echo $ADD_NEW_PRODUCT ?>' class="submitButton">Submit btn</button>

            </div>

        </form>
        <!-- onclick="reset()" -->
    </section>
    <div id="snackbar-container">
    </div>
</div>

<script>
    const selectizeSetting = {
        create: true,
        sortField: "text",
        create: false
    }

    let $select, $newBookManufactureSelect, $newBookCategorySelect = null;


    function openTab(event, id) {
        console.log("đâ");

        $("#adminContent").children("div").each(function(index, element) {
            element.classList.remove("active");
        })
        $("#sidebar").children("div").each(function(index, element) {
            element.classList.remove("sidebarItemActive");
        })
        event.currentTarget.classList.add("sidebarItemActive");

        $(`#${id}`).addClass("active");
    }


    $(document).ready(function() {
        $select = $("#newBookAuthor").selectize({
            ...selectizeSetting
        })
        $select[0].selectize.setValue("Search here");

        $newBookManufactureSelect = $("#newBookManufacture").selectize({
            ...selectizeSetting
        });
        $newBookManufactureSelect[0].selectize.setValue("Search here");

        $newBookCategorySelect = $("#newBookCategory").selectize({
            ...selectizeSetting,
            maxItems: 100
        });
        $newBookCategorySelect[0].selectize.setValue("Search here");
    })

    function reset() {
        $("#addBookForm").trigger('reset');
        $select[0].selectize.clear();
        $newBookManufactureSelect[0].selectize.clear();
        $newBookCategorySelect[0].selectize.clear();
    }

    $("#addNewProduct").click(function(event) {
        event.preventDefault();
        $("#loading").addClass("loadingShow");
        const data = new FormData();
        data.append("submit", $("#addNewProduct").val());
        data.append("bookName", $("#newBookName").val());
        data.append("bookQuantity", $("#newBookQuantity").val());
        data.append("bookPrice", $("#newBookPrice").val());
        data.append("bookAuthor", $select[0].selectize.getValue());
        data.append("bookDescription", $("#newBookDescription").val());
        data.append("bookManufacture", $newBookManufactureSelect[0]
            .selectize.getValue());
        data.append("bookCategory", $newBookCategorySelect[0].selectize
            .getValue());

        const fileList = $("#newBookImage")[0].files
        if (fileList.length > 0) {
            for (let i = 0; i < fileList.length; i++) {
                data.append("bookImage[]", fileList[i]);
            }
        } else if (fileList.length === 1) {
            data.append("bookImage[]", fileList["0"]);
        }
        reset();
        request = $.ajax({
            url: "./ajax/admin.php",
            type: "post",
            data: data,
            processData: false,
            contentType: false,
        });
        request.done(function(response, textStatus, jqXHR) {
            $.snackbar({
                content: "Success!!!",
                timeout: 5000,
                style: "customSnackbar snackbar-success"
            });
            $("#loading").removeClass("loadingShow");
        });
        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.parse(jqXHR.responseText));
            $.snackbar({
                content: "Error!",
                timeout: 5000,
                style: "customSnackbar snackbar-error"
            });
            $("#loading").removeClass("loadingShow");
        });
    })
</script>