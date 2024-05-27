$(document).ready(function () {
    $.ajax({
        url: '/admin/pie-charhd/',
        method: 'GET',
        success: function (data) {
            var ctx = document.getElementById('genderCharthd').getContext('2d');
            var genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Hết hạn: ' + data.male, 'Hoạt động: ' + data.female],
                    datasets: [{
                        data: [data.male, data.female],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ]
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Gender Ratio',
                        fontSize: 40
                    }
                }
            });
        }
    });

});
