<?php
// $StatiscalBookByMonth
?>


<div id=<?php echo $STATISTICAL ?> class="<?php echo $tab == "" || $tab == $STATISTICAL ? "active" : "" ?>">
    <h3>Statistical</h3>


    <div class="statisticalContent container">


        <section class="row">
            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <div class="statisticalCard flex-lg-row flex-md-row flex-sm-column flex-column">
                    <div class="iconWrapper">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="contentWrapper ml-lg-3 ml-md-3">
                        <p>Page views</p>
                        <p>100.000</p>
                    </div>
                </div>

            </div>


            <div class="col-lg-3 col-md-6 col-6 pl-0 pr-lg-1 pr-0 ">
                <div class="statisticalCard flex-lg-row flex-md-row flex-sm-column flex-column">
                    <div class="iconWrapper">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="contentWrapper ml-lg-3 ml-md-3">
                        <p>Sold/month</p>
                        <p id="soldThisMonth">100</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <div class="statisticalCard flex-lg-row flex-md-row flex-sm-column flex-column">
                    <div class="iconWrapper">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="contentWrapper ml-lg-3 ml-md-3">
                        <p>Profit</p>
                        <p id="profitByMonth">100.000.000.000VNĐ</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 col-6 pl-0 pr-lg-1 pr-0">
                <div class="statisticalCard flex-lg-row flex-md-row flex-sm-column flex-column">
                    <div class="iconWrapper">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="contentWrapper ml-lg-3 ml-md-3">
                        <p>Profit</p>
                        <p>100.000.000.000VNĐ</p>
                    </div>
                </div>
            </div>

        </section>

        <div class="row mt-5 profitChart">
            <h4>Sold by month</h4>
            <div style="height: 300px" class="w-100">
                <canvas id="soldByMonthChart"></canvas>

            </div>
        </div>

        <section class="d-flex mt-3 flex-wrap">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-0">
                <div class="smChart">
                    <h4>Sold percentage</h4>
                    <div class="chartWrapper w-100">
                        <canvas id="chartBookByCategory"></canvas>

                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 pr-0">
                <div class="smChart">
                    <h4>Growth chart</h4>
                    <div class="chartWrapper w-100">
                        <canvas id="growthChartByMonth"></canvas>

                    </div>

                </div>

            </div>

        </section>
    </div>




</div>


<script>
    let statiscalBookByMonth = <?php echo json_encode($StatiscalBookByMonth); ?>;
    const getMonth = (date) => {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        return monthNames[date.getMonth()];
    }
    console.log(statiscalBookByMonth);


    const soldByMonthChartLabels = [
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 5, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 4, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 3, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 2, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth(), 1)),
    ]
    let soldThisMonth = 0;
    const soldByMonthChartData = [0, 0, 0, 0, 0, 0];
    for (let i = 0; i < statiscalBookByMonth.length; i++) {
        if (
            new Date(statiscalBookByMonth[i].statistcalDate.date).getMonth() + 1 === new Date().getMonth()) {
            soldThisMonth += statiscalBookByMonth[i].totalQuantity
        }
        soldByMonthChartData[new Date(statiscalBookByMonth[i].statistcalDate.date).getMonth() + 1 - soldByMonthChartLabels.length] +=
            statiscalBookByMonth[i].totalQuantity;
    }

   $("#soldThisMonth").html(soldThisMonth);


    const ctx = $("#soldByMonthChart");
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: soldByMonthChartLabels,
            datasets: [{
                data: soldByMonthChartData,
                backgroundColor: [
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29'
                ],
                borderColor: [
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29',
                    '#f07c29'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 1,
                    to: 0,
                    loop: true
                }
            },
            scales: {
                y: { // defining min and max so hiding the dataset does not change scale range
                    min: 0,
                    max: 100
                }
            },

            plugins: {
                legend: {
                    display: false
                }
            },
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    const centerTotal = {
        id: "centerTotal",
        beforeDraw: (chart, args, options) => {
            const {
                ctx,
                chartArea: {
                    top,
                    right,
                    bottom,
                    left,
                    width,
                    height
                }
            } = chart;
            const radius = (width > top + height ? top + height : width) / 2 - 3;
            const x = width / 2,
                y = top + height / 2;
            ctx.beginPath();
            ctx.arc(x, y, radius / 2, 0, 2 * Math.PI);
            ctx.fillStyle = "#222";
            ctx.fill();
            ctx.save();
            ctx.fillStyle = "#F07C29";

            ctx.font = "30px sans-serif";
            ctx.fillText('67', (width / 2.27), top + (height / 2));
        }
    }


    let categoryBookChartColor = ['rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
    ]

    const categoryCtx = $("#chartBookByCategory");
    const categoryChart = new Chart(categoryCtx, {
        type: 'doughnut',
        data: {

            datasets: [{
                label: 'My First Dataset',
                data: [{
                    value: 1000,
                    label: "Phiêu lưu"
                }, {
                    value: 810,
                    label: "Viễn tưởng"
                }, {
                    value: 600,
                    label: "Tiểu thuyết"
                }],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },

        plugins: [centerTotal, ChartDataLabels],
        options: {
            plugins: {
                datalabels: {
                    color: '#fff',
                    // anchor:"end",
                    formatter: (arg) => {
                        return arg.label;
                    },
                    arc: true,
                    // rotation:[-105,-105,-105]
                },
            },
            maintainAspectRatio: false,

        },
        // options:{}
    });
</script>


<script>
    var formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
    });

    let profit = 0;
    const labels = [
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 5, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 4, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 3, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 2, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1)),
        getMonth(new Date(new Date().getFullYear(), new Date().getMonth(), 1)),
    ]
    const data = [0, 0, 0, 0, 0, 0];
    for (let i = 0; i < statiscalBookByMonth.length; i++) {
        if (
            new Date(statiscalBookByMonth[i].statistcalDate.date).getMonth() + 1 === new Date().getMonth()) {
            profit += statiscalBookByMonth[i].totalPrice
        }
        data[new Date(statiscalBookByMonth[i].statistcalDate.date).getMonth() + 1 - labels.length] +=
            statiscalBookByMonth[i].totalPrice;
    }

    $("#profitByMonth").html(formatter.format((profit)));



    const growthChartCtx = $("#growthChartByMonth");
    const growthChart = new Chart(growthChartCtx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                // label: 'My First Dataset',
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: (data, ctx) => {
                        const listData = data.dataset.data;
                        const dataIndex = data.dataIndex;
                        if (dataIndex === 0)
                            return "#28a745"

                        else {
                            return listData[dataIndex] > listData[dataIndex - 1] ? "#28a745" : "#dc3545";
                        }
                    },
                    anchor: "end",
                    align: "end",
                    formatter: (arg) => {
                        return;
                    },
                    arc: true,
                    // rotation:[-105,-105,-105]
                },
            },
            maintainAspectRatio: false,

        },


    })
</script>