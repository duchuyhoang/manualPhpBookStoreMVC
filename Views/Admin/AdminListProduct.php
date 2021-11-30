<div id=<?php echo $LIST_PRODUCT ?> class="<?php echo $tab == "" || $tab == $LIST_PRODUCT ? "active" : "" ?>">
    <h3>List product</h3>

    <div class="d-flex mb-4 mt-2">
        <div class="col-3 pl-0 listProductFilter">
            <p>Category:</p>
            <select class="select" id="categoryFilter">
                <option value="-1">All</option>
                <?php
                foreach ($ListCategory as $category) {
                    echo "<option value={$category->getId_category()}>{$category->getCat_name()}</option>";
                }

                ?>
            </select>
        </div>
        <div class="col-3 listProductFilter">
            <p>Author:</p>
            <select class="select" id="authorFilter">
                <option value="-1">All</option>
                <?php
                foreach ($ListAuthor as $author) {
                    echo "<option value={$author->getId_author()}>{$author->getName()}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-3 listProductFilter">
            <p>Manufacture:</p>
            <select class="select" id="manufactureFilter">
                <option value="-1">All</option>
                <?php
                foreach ($ListManufacture as $manufacture) {
                    echo "<option value={$manufacture->getId_manufacture()}>{$manufacture->getName()}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-3 listProductFilter">
            <p>Date:</p>
            <input type="text" id="listProductDateRange" style="padding:8px">


        </div>




    </div>


    <section class="panel panel-primary">
        <div class="panel-body">
            <table id="table" class="table table-striped table-bordered table_list_product">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col" style="width:20%">Tên sách</th>
                        <th scope="col">Ngày tạo</th>

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

                        <div class="mt-1 w-100 form-group">
                            <label for="newBookImage">Images</label>

                            <div class="d-flex flex-wrap" id="listImageWrapper">

                            </div>

                            <input type="file" accept="image/*" id="newBookImage" multiple onchange="addImage(event)" />

                        </div>
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




<div class="modal fade" id="confirmDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete this product?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="deleteProduct()">Ok</button>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<script>
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    var currentImageList = [];
    var newImageList = [];



    function buildPreviewImage(listUrl, isFirstModal = true) {
        let html = "";
        isFirstModal ? currentImageList = [...listUrl] : currentImageList = [...currentImageList, ...listUrl];
        console.log(currentImageList);
        for (let i = 0; i < currentImageList.length; i++) {
            html += `<div class="previewImage">
            <div class="iconDelete" onclick="deleteImage('${currentImageList[i].id_image}')"><i class="fas fa-times"></i></div>
    <img src="${currentImageList[i].url}" alt=""></div>
    `;
        }

        $("#listImageWrapper").html(html);

        return html;
    }

    function deleteImage(id_image) {
        currentImageList.
        splice(currentImageList.findIndex((bookImage) => bookImage.id_image.toString() === id_image.toString()), 1);
        newImageList.
        splice(currentImageList.findIndex((bookImage) => bookImage.id_image.toString() === id_image.toString()), 1);
        buildPreviewImage(currentImageList);
    }

    function addImage(e) {
        // console.log(e.target.files);
        for (let i = 0; i < e.target.files.length; i++) {
            const newImageId = makeid(20)
            currentImageList.push({
                id_image: newImageId,
                url: URL.createObjectURL(e.target.files[i])
            })
            newImageList.push({
                id_image: newImageId,
                file: e.target.files[i]
            })
        }
        buildPreviewImage(currentImageList);
    }
</script>



<script>
    const selectizeSetting = {
        create: true,
        sortField: "text",
        create: false
    }
    var deleteProductId = null;

    function setDeleteProductId(id_product) {
        deleteProductId = id_product;
    }



    function deleteProduct() {
        request = $.ajax({
            url: "./ajax/admin.php",
            type: "post",
            data: {
                submit: "DELETE_PRODUCT",
                idBook: deleteProductId
            }
        });
        request.done(function(response, textStatus, jqXHR) {
            $.snackbar({
                content: "Success!!!",
                timeout: 5000,
                style: "customSnackbar snackbar-success"
            });
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
    }


    let $select, $newBookManufactureSelect, $newBookCategorySelect = null;

    var minDateFilter = "";
    var maxDateFilter = "";




    $.fn.dataTableExt.afnFiltering.push(
        function(oSettings, aData, iDataIndex) {
            if (typeof aData._date == 'undefined') {
                aData._date = new Date(aData[2]).getTime();
            }

            if (minDateFilter && !isNaN(minDateFilter)) {
                if (aData._date < minDateFilter) {
                    return false;
                }
            }



            return true;
        })



    const handleSetListener = (e, idBook) => {
        // $('.edit').each(function(_, item) {

        // item.removeEventListener('click', (function(e) {

        // }));
        // item.addEventListener('click', (function(e) {
        e.preventDefault();
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




        if (data.listImage?.length > 0) {
            buildPreviewImage(data.listImage.map((bookImage) => ({
                url: bookImage.url,
                id_image: bookImage.id_image
            })));

        }

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
            "columnDefs": [{
                    className: "nameTh",
                    "targets": [1]
                },
                {
                    className: "categoryTh",
                    "targets": [3]
                },
                {
                    className: "authorTh",
                    "targets": [4]
                },

                // {
                //     className: "manufactureTh",
                //     "targets": [5]
                // },


            ],


            columns: [{
                    "render": function(data, type,
                        JsonResultRow) {
                        return `<img style="width: 100px; height: 100px;" src="${JsonResultRow?.listImage ? JsonResultRow?.listImage[0]?.url : ""}">`;
                    }
                },


                {
                    data: 'name'

                },
                {
                    "render": function(data, type, JsonResultRow) {
                        return JsonResultRow.createAt ? moment(JsonResultRow.createAt).format('MM/DD/YYYY') : "Unknown"
                    }
                },


                {
                    "render": function(data, type,
                        JsonResultRow) {
                        let category = "";
                        JsonResultRow.category.map((
                            cat) => {
                            category +=
                                `${cat.cat_name} `;
                        })
                        return JsonResultRow.category.length === 0 ? "Không có danh mục" : category;
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

                    // "
                    "render": function(data, type,
                        JsonResultRow) {
                        return `
                        <div class="d-flex flex-column">
                        <button  class="edit btn btn_edit_product" data-idBook="${JsonResultRow.id_book}" 
                        data-toggle="modal" data-target="#exampleModal" 
                        onclick="handleSetListener(event,${JsonResultRow.id_book})">Edit</button>
                        &nbsp<button class="btn btn_delete_product" href="#" id="delete" data-idBook="${JsonResultRow.id_book}" data-toggle="modal" onclick="setDeleteProductId(${JsonResultRow.id_book})" 
                        data-target="#confirmDeleteProduct">Delete</button>
                        </div>
                        `;
                    }
                },
            ],
            "pageLength": 4
        })
        $('#table_filter input').addClass('searchInput');


        $("#categoryFilter").change(function(e) {
            if (this.selectedIndex == 0) datatable.columns(3).search("").draw();
            else {
                datatable.columns(3).search(this.options[this.selectedIndex].innerHTML).draw();
            }
        })


        $("#authorFilter").change(function(e) {
            if (this.selectedIndex == 0) datatable.columns(4).search("").draw();
            else {
                console.log(this.options[this.selectedIndex].innerHTML);

                datatable.columns(4).search(this.options[this.selectedIndex].innerHTML).draw();

            }
        })

        $("#manufactureFilter").change(function(e) {
            if (this.selectedIndex == 0) datatable.columns(5).search("").draw();
            else {
                datatable.columns(5).search(this.options[this.selectedIndex].innerHTML).draw();

            }
        })


        $("#listProductDateRange").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        }, function(start, end, label) {
            minDateFilter = start._d;
            maxDateFilter = end._d;

            datatable.draw();
        });

        $("#listProductDateRange").on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });



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
            data.append("newBookCategory",
                $newBookCategorySelect[0].selectize
                .getValue());
            data.append("productImageListId", currentImageList.map((image) => image.id_image));

            if (newImageList.length > 0) {
                if (newImageList.length === 1)
                    data.append("newImageList[]", newImageList[0].file);
                else {
                    for (let i = 0; i < newImageList.length; i++)
                        data.append("newImageList[]", newImageList[i].file);
                }
            }


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