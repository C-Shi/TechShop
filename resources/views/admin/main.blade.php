main
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 dashboard-card">
            <i class="fas fa-users"></i>5 Users
        </div>
        <div class="col-md-3 dashboard-card">
            <i class="fas fa-users"></i>6 Categories
        </div>
        <div class="col-md-3 dashboard-card">
            <i class="fas fa-users"></i>10 Products
        </div>
    </div>

    {{-- profit statistic chart --}}
    <hr>
    profit statistical chart

    {{-- category and product distribution --}}
    <hr>
    <div class="row">
        <div class="col-md-6 offset-md-2">
            <canvas id="myChart" width="200" height="200"></canvas>
        </div>
    </div>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [@foreach($categories as $category) '{{ $category->name }}', @endforeach],
            datasets: [{
                label: '# of Products',
                data: [@foreach($categories as $category) '{{ $category->number }}', @endforeach],
                backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
                ],
            }]
        },
        options:{
            title: {
                display: true,
                fontSize: '18',
                position: 'top',
                fontFamily: 'Arial',
                text: 'Product Categorization Statistic and BreakDown'
            },
            legend: {
                position: 'bottom'
            }
        }
    });
</script>
