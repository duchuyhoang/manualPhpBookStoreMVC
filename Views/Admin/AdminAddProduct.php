<div id=<?php echo $ADD_PRODUCT ?> class="<?php echo $tab == "" || $tab == $ADD_PRODUCT ? "active" : "" ?>">
    <h2>Add product</h2>
    <section class="mt-3">
        <form action="./" method="post" id="addBookForm">
            <div class="mt-1 w-100 form-group">
                <label for="newBookName">Book name</label>
                <input type="text" class="baseInput" placeholder="Enter book name..." id="newBookName">
            </div>
            <div class="mt-1 w-100 form-group">
                <label for="newBookQuantity">Book quantity</label>
                <input type="number" id="newBookQuantity" class="baseInput" placeholder="Book quantity..." min="1" step="1" onkeypress="return event.charCode >= 48">
            </div>
            <div class="mt-1 w-100 form-group">
                <label for="newBookPrice">Book price</label>
                <input type="number" id="newBookPrice" class="baseInput" placeholder="Book price..." min="1" step="1" onkeypress="return event.charCode >= 48">
            </div>
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

            <div class="mt-1 w-100 form-group">
                <label for="newBookDescription">Description</label>
                <textarea class="baseInput" id="newBookDescription"></textarea>
            </div>

            <button type="reset" onclick="reset()">Submit btn</button>
        </form>
    </section>
</div>

<script>
    const selectizeSetting = {
        create: true,
        sortField: "text",
        create: false
    }

    let $select, $newBookManufactureSelect, $newBookCategorySelect = null;

    function openTab(event, id) {
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

    // function reset() {
    //     console.log("hello");
    //     $("#addBookForm").trigger('reset');
    //     $select.clear();
    //     $newBookManufactureSelect.clear();
    //     $newBookCategorySelect.clear();
    // }
</script>