<div id=<?php echo $LIST_PRODUCT ?> class="<?php echo $tab == "" || $tab == $LIST_PRODUCT ? "active" : "" ?>">
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

    <div class="modal  fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">
                        <p class="orderTitle">Order detail</p>
                        <div class="orderTime">
                            Tuesday, December 08, 2020
                        </div>
                        <div class="d-flex justify-content-center mt-4 orderStatus">
                            Order #12615 is currently
                            <p class="orderSt">proccesing</p>
                        </div>

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="w-100">
                        <tr>
                            <th style="width:70%">Product</th>
                            <th style="width:30%">Total</th>
                        </tr>

                        <tr class="productContainer">
                            <td class="product">
                                <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="" class="avatar">
                                <a href="./product?id_product=1" class="name">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore laboriosam perspiciatis architecto vitae deleniti nobis illum. Mollitia consequatur cum tempore odio at, ducimus quis molestias reprehenderit, voluptate quaerat maiores? Ab?</a>

                            </td>
                            <td>Maria Anders</td>
                        </tr>
                        <tr class="productContainer">
                            <td class="product">
                                <img src="https://www.w3schools.com/tags/img_girl.jpg" alt="" class="avatar">
                                <a href="./product?id_product=1" class="name">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore laboriosam perspiciatis architecto vitae deleniti nobis illum. Mollitia consequatur cum tempore odio at, ducimus quis molestias reprehenderit, voluptate quaerat maiores? Ab?</a>

                            </td>
                            <td>Maria Anders</td>
                        <tr>



                    </table>

                    <div class="orderInfo mt-3">
                        <table class="w-100 mt-3">
                            <tr>
                                <th style="width:70%">Owner name</th>
                                <th style="width:30%">Thầy</th>
                            </tr>

                            <tr>
                                <th style="width:70%">Receiver name</th>
                                <th style="width:30%">Thầy</th>
                            </tr>
                            <tr>
                                <th style="width:70%">Receiver email</th>
                                <th style="width:30%">Mastercard</th>
                            </tr>

                            <tr>
                                <th style="width:70%">Receiver Phone</th>
                                <th style="width:30%">Mastercard</th>
                            </tr>
                            <tr>
                                <th style="width:70%">Payment</th>
                                <th style="width:30%">Free</th>
                            </tr>
                            <tr>
                                <th style="width:70%">Order</th>
                                <th style="width:30%">Free</th>
                            </tr>
                        </table>

                    </div>

                    <div class="orderTotal mt-3">
                        <table class="w-100 mt-3">
                            <tr>
                                <th style="width:70%">Total</th>
                                <th style="width:30%">100$</th>
                            </tr>
                        </table>
                    </div>


                    <div class="d-flex orderAddress align-items-center">
                        <div class="col-6">
                            <div class="orderAddressTitle">Billing Address</div>
                            James Thompson, 356 Jonathon Apt.220,New York
                        </div>
                        <div class="col-6">
                            <div class="orderAddressTitle">Shipping Address</div>
                            James Thompson, 356 Jonathon Apt.220,

                            New York
                        </div>
                    </div>
                    <div class="orderAddressNote">
                        <div class="orderAddressNoteTitle">
                            Order address note
                        </div>
                        <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, alias neque voluptates earum accusamus magni id, mollitia quaerat aut repudiandae, assumenda vitae a quibusdam beatae velit? Magni eos consequatur qui.</div>
                    </div>

                    <div class="orderAddressNote">
                        <div class="orderAddressNoteTitle">
                            Order Note
                        </div>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam mollitia reprehenderit distinctio rem amet ex odit magnam officia, iure vel recusandae doloremque commodi possimus necessitatibus, accusantium molestiae autem dolore? Commodi?</div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button value='<?php echo $EDIT_PRODUCT ?>' type="button" class="btn btn-primary" id="editProduct">Save
                        changes</button>
                </div> -->
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
                            return '<p class="text-warning">Đang chờ xử lý...</p>';
                        if (JsonResultRow.status === 1)
                            return '<p class="text-success">Đã xử lý thành công!</p>';
                        if (JsonResultRow.status === -1)
                            return '<p class="text-danger">Đã từ chối</p>';
                    }
                },
                {
                    "render": function(data, type,
                        JsonResultRow) {
                        // data-toggle="modal" data-target="#exampleModal"
                        return `<button class="btn-order-detail btn" data-idBook="${JsonResultRow.id_order}"  onclick="getOrderDetail('${JsonResultRow.id_order}')">Chi tiết</button>
                    &nbsp<button class="btn-edit-detail btn" id="delete" data-idBook="${JsonResultRow.id_order}">Delete</button>`;
                    }
                },
            ],
            "pageLength": 4
        })

    })
</script>


<script>
    function getOrderDetail(id_order) {
        $("#loading").addClass("loadingShow");

        request = $.ajax({
            url: "./ajax/admin.php",
            type: "post",
            data: {
                submit: "GET_ORDER",
                id_order: id_order
            },
            // processData: false,
            // contentType: false,
        });
        request.done(function(response, textStatus, jqXHR) {
            // $.snackbar({
            //     content: "Success!!!",
            //     timeout: 5000,
            //     style: "customSnackbar snackbar-success"
            // });
            // <th style='width:30%'>${orderInfo.owner.name}</th>
            $("#loading").removeClass("loadingShow");

            const orderInfo = JSON.parse(response).data;
            $("#exampleModal").html(
                `<div class='modal-dialog modal-lg' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title w-100 text-center' id='exampleModalLabel'>
                                    <p class='orderTitle'>Order detail</p>
                                    <div class='orderTime'>
                                        Tuesday, December 08, 2020
                                    </div>
                                    <div class='d-flex justify-content-center mt-4 orderStatus'>
                                        Order #${orderInfo.id_order} is currently
                                        <p class='orderSt'>proccesing</p>
                                    </div>

                                </h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <table class='w-100'>
                                    <tr>
                                        <th style='width:70%'>Product</th>
                                        <th style='width:30%;text-align:right'>Total</th>
                                    </tr>
            ${
                orderInfo.cart.listBook.map((bookItem)=>`
                <tr class='productContainer'>
                                        <td class='product'>
                                            <img src='${bookItem.listImage.length >0 ? bookItem.listImage[0].url :""}' alt='' class='avatar'>
                                            <a href='./product?id_product=${bookItem.id_book}' class='name'>${bookItem.name}</a>

                                        </td>
                                        <td>${
                                            bookItem.price*bookItem.boughtQuantity-bookItem.price*bookItem.boughtQuantity*bookItem.sale             
                                        }VNĐ</td>
                                    </tr>
                `).join()


            }

                                </table>

                                <div class='orderInfo mt-3'>
                                    <table class='w-100 mt-3'>
                                        <tr>
                                            <th style='width:70%'>Owner name</th>
                                            <th style='width:30%'>${orderInfo.owner.name}</th>

                                        </tr>

                                        <tr>
                                            <th style='width:70%'>Receiver name</th>
                                            <th style='width:30%'>${orderInfo.receiverName}</th>
                                        </tr>
                                        <tr>
                                            <th style='width:70%'>Receiver email</th>
                                            <th style='width:30%'>${orderInfo.receiverEmail}</th>
                                        </tr>

                                        <tr>
                                            <th style='width:70%'>Receiver Phone</th>
                                            <th style='width:30%'>${orderInfo.receiverPhone}</th>
                                        </tr>
                                        <tr>
                                            <th style='width:70%'>Payment</th>
                                            <th style='width:30%'>${orderInfo.payment.name}</th>
                                        </tr>
                                        <tr>
                                            <th style='width:70%'>Order</th>
                                            <th style='width:30%'>${orderInfo.orderType.name}</th>
                                        </tr>
                                    </table>

                                </div>

                                <div class='orderTotal mt-3'>
                                    <table class='w-100 mt-3'>
                                        <tr>
                                            <th style='width:70%'>Total</th>
                                            <th style='width:30%'>${
                                                orderInfo.cart.listBook.reduce(
                                                    (sum,bookItem)=>sum+bookItem.price*bookItem.boughtQuantity-bookItem.price*bookItem.boughtQuantity*bookItem.sale
                                                    ,0)    
                                            }VNĐ</th>
                                        </tr>
                                    </table>
                                </div>


                                <div class='d-flex orderAddress align-items-center'>
                                    <div class='col-6'>
                                        <div class='orderAddressTitle'>Billing Address</div>
                                        James Thompson, 356 Jonathon Apt.220,New York
                                    </div>
                                    <div class='col-6'>
                                        <div class='orderAddressTitle'>Shipping Address</div>
            ${orderInfo.address ? `${orderInfo.address.province_name},${orderInfo.address.district_name},${orderInfo.address.ward_name}`:"Unknown"}
                                    </div>
                                </div>

                                <div class="orderAddressNote">
                        <div class="orderAddressNoteTitle">
                            Order address note
                        </div>
                        <div>${orderInfo.address ? (!orderInfo.address.moreInfo.trim().length==0 ? orderInfo.address.moreInfo : "No infomation") : "No infomation"}</div>
                    </div>

                    <div class="orderAddressNote">
                        <div class="orderAddressNoteTitle">
                            Order Note
                        </div>
                        <div>
                        ${!orderInfo.note.trim().length==0 ? orderInfo.note  : "No infomation"}
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>`

                //  <div class='modal-footer'>
                //                     <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                //                     <button value='<?php echo $EDIT_PRODUCT ?>' type='button' class='btn btn-primary' id='editProduct'>Save
                //                         changes</button>
                //                 </div>
            )


            $("#exampleModal").modal("show");
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
</script>