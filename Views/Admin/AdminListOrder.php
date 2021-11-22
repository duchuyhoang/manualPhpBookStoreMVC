<div id=<?php echo $LIST_PRODUCT ?>
    class="<?php echo $tab == "" || $tab == $LIST_PRODUCT ? "active" : "" ?>">
    <h3>List Order</h3>
    <section class="panel panel-primary">
        <div class="panel-body">
            <table id="table" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 200px;">Tên khách hàng
                        </th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col" style="width: 100px;">Loại đơn</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>

    <div id="snackbar-container">
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit product
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addBookForm">
                        <div class="mt-1 w-100 form-group">
                            <label for="newBookName">Book name</label>
                            <input type="text" class="baseInput"
                                placeholder="Enter book name..."
                                id="newBookName">
                        </div>
                        <div class="mt-1 w-100 form-group">
                            <label for="newBookQuantity">Book quantity</label>
                            <input type="number" id="newBookQuantity"
                                class="baseInput" placeholder="Book quantity..."
                                min="1" step="1"
                                onkeypress="return event.charCode >= 48">
                        </div>
                        <div class="mt-1 w-100 form-group">
                            <label for="newBookPrice">Book price</label>
                            <input type="number" id="newBookPrice"
                                class="baseInput" placeholder="Book price..."
                                min="1" step="1"
                                onkeypress="return event.charCode >= 48">
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
                            <textarea class="baseInput"
                                id="newBookDescription"></textarea>
                        </div>

                        <div class="mt-1 w-100 form-group">
                            <label for="newBookImage">Images</label>
                            <input type="file" accept="image/*"
                                id="newBookImage" multiple />

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button value='<?php echo $EDIT_PRODUCT ?>' type="button"
                        class="btn btn-primary" id="editProduct">Save
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
    $('#newBookAuthor').children().each(function(_, item) {
        if (item.innerHTML === data.author.name) item.setAttribute(
            'selected', true)
    })
    $('#newBookManufacture').children().each(function(_, item) {
        if (item.innerHTML === data.author.name) item.setAttribute(
            'selected', true)
    })
    $('#newBookCategory').children().each(function(_, item) {
        if (item.innerHTML === data.author.name) item.setAttribute(
            'selected', true)
    })
    $('#newBookDescription').val(data.description);
    $('#editProduct').data(id_book, data.id_book);
}

$(document).ready(function() {
    $dataTable = <?php echo json_encode($listOrder); ?>;
    console.log($dataTable);

    $('#table').DataTable({
        data: $dataTable,
        columns: [{
                "render": function(data, type,
                    JsonResultRow) {
                    return JsonResultRow.orderUser.name;
                }
            },
            {
                "render": function(data, type,
                    JsonResultRow) {
                    const date = new Date(JsonResultRow
                        .createAt.date);
                    return date.toISOString().slice(0,
                        10);
                }
            },
            {
                "render": function(data, type,
                    JsonResultRow) {
                    return JsonResultRow.orderType.name
                }
            },
            {
                "render": function(data, type,
                    JsonResultRow) {
                    if (JsonResultRow.status === 0)
                        return '<p style="color: red">Đang chờ xử lý...</p>';
                    if (JsonResultRow.status === 1)
                        return '<p style="color: green">Đã xử lý thành công!</p>';
                }
            },
            {
                "render": function(data, type,
                    JsonResultRow) {
                    return `<a href="#" class="edit" data-idBook="${JsonResultRow.id_book}" data-toggle="modal" data-target="#exampleModal">Chi tiết</a>&nbsp<a href="#" id="delete" data-idBook="${JsonResultRow.id_book}">Delete</a>`;
                }
            },
        ],
        "pageLength": 4
    })

})
</script>