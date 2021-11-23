<div id=<?php echo $LIST_PRODUCT ?> class="<?php echo $tab == "" || $tab == $LIST_PRODUCT ? "active" : "" ?>">
    <h3>List product</h3>
    <section class="panel panel-primary">
        <div class="panel-body">
            <table id="table" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Thuộc danh mục</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col" style="width: 150px;">Nhà xuất bản</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>

    <div id="snackbar-container">
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit product
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBookForm">
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

                        <!-- <div class="mt-1 w-100 form-group">
                            <label for="newBookImage">Images</label>
                            <input type="file" accept="image/*" id="newBookImage" multiple />

                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button value='<?php echo $EDIT_PRODUCT ?>' type="submit" class="btn btn-primary" id="editProduct">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    const selectizeSetting = {
        create: true,
        sortField: "text",
        create: false
    }

    let $select, $newBookManufactureSelect, $newBookCategorySelect = null;


    const handleSetListener = (e, idBook) => {
        // $('.edit').each(function(_, item) {

        // item.removeEventListener('click', (function(e) {

        // }));
        // item.addEventListener('click', (function(e) {
        e.preventDefault();
        console.log(e.currentTarget);
        $("#loading").addClass("loadingShow");

        // const idBook = +e.currentTarget.dataset
        //     .idbook;
        const data = {
            submit: 'GET_PRODUCT',
            idBook: idBook
        };
        const request = $.ajax({
            url: "./ajax/admin.php",
            type: "post",
            data: data,
        });

        request.done(function(response,
            textStatus,
            jqXHR) {
            const responseData = JSON
                .parse(
                    response)
            addDataToFormEdit(
                responseData
                .data)
            $("#loading").removeClass(
                "loadingShow");
        });
        request.fail(function(jqXHR, textStatus,
            errorThrown) {
            $.snackbar({
                content: "Error!",
                timeout: 5000,
                style: "customSnackbar snackbar-error"
            });
            $("#loading").removeClass(
                "loadingShow");
        });
        // }))
        // })
    }


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

    function addDataToFormEdit(data) {
        $('#newBookName').val(data.name);
        $('#newBookQuantity').val(data.quantity);
        $('#newBookPrice').val(data.price);
        $select[0].selectize.setValue(data.author.id_author);
        $newBookManufactureSelect[0].selectize.setValue(data.manufacture
            .id_manufacture);
        const listCat = data.category.map(item => item.id_category)
        $newBookCategorySelect[0].selectize.setValue(listCat)
        $('#newBookDescription').val(data.description);
        $('#editProduct').data('id_book', data.id_book);
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

        $("#loading").addClass("loadingShow");

        $dataTable = <?php echo json_encode($listAllBook); ?>;


        $dataTable = $dataTable.map((data) => {
            return {
                ...data,
                authorName: data.author.name,
                manufactureName: data.manufacture.name
            }
        })
        // 
        const datatable = $('#table').DataTable({
            data: $dataTable,
            columns: [{
                    "render": function(data, type,
                        JsonResultRow) {
                        return `<img style="width: 100px; height: 150px;" src="${JsonResultRow?.listImage?.length>0 ? JsonResultRow?.listImage[0].url : ""}">`;
                    }
                },
                {
                    data: 'name'

                },
                {
                    "render": function(data, type,
                        JsonResultRow) {
                        let category = "";
                        JsonResultRow.category.map((cat) => {
                            category += `${cat.cat_name} `;
                        })
                        return category;
                    }
                },
                {
                    data: 'authorName'
                },
                {
                    data: 'manufactureName'
                },
                {
                    data: 'price'
                },
                {
                    data: 'quantity'
                },
                {
                    "render": function(data, type,
                        JsonResultRow) {
                        return `<a href="#" class="edit" data-idBook="${JsonResultRow.id_book}" data-toggle="modal" data-target="#exampleModal" onclick="handleSetListener(event,${JsonResultRow.id_book})">Edit</a>&nbsp<a href="#" id="delete" data-idBook="${JsonResultRow.id_book}">Delete</a>`;
                    }
                },
            ],
            "pageLength": 4
        })
        const edits = $('.edit');




        // setTimeout(() => {
        //     $(".paginate_button").each(function(index, element) {
        //         console.log(element);
        //         // element.removeEventListener("click", () => {});

        //         element.addEventListener("click", () => {
        //             console.log("ada");
        //             handleSetListener();
        //         })
        //     })
        // }, 200)






        $("#editProduct").click(function(event) {
            event.preventDefault();
            $("#loading").addClass("loadingShow");
            const data = new FormData();
            data.append("submit", $("#editProduct").val());
            data.append("idBook", $("#editProduct").data(
                "id_book"));
            data.append("newBookName", $("#newBookName").val());
            data.append("newBookQuantity", $("#newBookQuantity")
                .val());
            data.append("newBookPrice", $("#newBookPrice").val());
            data.append("newBookAuthor", $select[0].selectize
                .getValue());
            data.append("newBookDescription", $(
                    "#newBookDescription")
                .val());
            data.append("newBookManufacture",
                $newBookManufactureSelect[0]
                .selectize.getValue());

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
                // $dataTable = $dataTable.map((data) => {
                //     if (data.id_book == ("#editProduct").data("id_book")) {
                //         return {
                //             ...data,
                //             name: $("#newBookName").val(),
                //             quantity: $("#newBookQuantity").val(),
                //             price: $("#newBookPrice").val(),
                //             description: $("#newBookDescription").val()
                //         }
                //     }
                //     return data;
                // })
                window.location.reload();
                // console.log(response);
            });
            request.fail(function(jqXHR, textStatus, errorThrown) {
                $.snackbar({
                    content: "Error!",
                    timeout: 5000,
                    style: "customSnackbar snackbar-error"
                });
                $("#loading").removeClass("loadingShow");
            });
        })
    })
</script>