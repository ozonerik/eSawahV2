@push('search')
    <x-navitem_search target='dashboard' placeholder="Search..."/>
@endpush
@push('js')
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                label               : 'Digital Goods',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        }

        new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
        })
        new Chart(barChartCanvas2, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
        })
    </script>
@endpush
<div>
    <x-content_header name="Dashboard" >
        <li class="breadcrumb-item active">Dashboard</a></li>
    </x-content_header>
    <div class="row mx-1">
        <x-card_info title="Selamat Datang" message="Selamat datang, dan selamat menggunakan aplikasi eSawah kami." />
    </div>         
    <div class="row mx-1">
        <x-info_box icon="fas fa-seedling" message="Sawah" value="10" type="success"/>
        <x-info_box icon="fas fa-users" message="Pawongan" value="5" type="primary"/>
        <x-info_box icon="fas fa-money-bill-wave" message="Nilai Asset" value="1M" type="warning"/>
        <x-info_box icon="fas fa-coins" message="Nilai Lanja" value="1K" type="info"/>
    </div>
    <div class="row mx-1">
        <x-info_box2 icon="fas fa-wallet" message="Total Lanja Masuk Tahun 2022" value="10" type="success"/>
        <x-info_box2 icon="fas fa-donate" message="Nilai Zakat Tahun 2022" value="10" type="primary"/>
    </div>
    <div class="row mx-1">
        <x-card_chart width="6" type="warning" title="Grafik Lanja Tahun 2022" idbarchart="barChart"/>
        <x-card_chart width="6" type="info" title="Grafik Lanja per Tahun" idbarchart="barChart2"/>
    </div>
    <div class="row mx-1">
        <x-card_table width="6" title="Pawongan Terbaik">
            <x-slot:thead>
                <th>No</th>
                <th>Pawongan</th>
                <th>Sawah</th>
                <th>Nilai Lanja</th>
            </x-slot>
                <tr>
                    <td>1</td>
                    <td>Asep</td>
                    <td>Dukuh Jeruk</td>
                    <td>4.000.000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dedeh</td>
                    <td>Karangampel</td>
                    <td>2.000.000</td>
                </tr>
            <x-slot:footer>
                <a href="#" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="#" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </x-slot>
        </x-card_table>
        <x-card_list width="6" title="Tunggakan Pawongan">
            <x-card_listitem photo="{{asset('dist/img/default-150x150.png')}}" link="#" title="Asep" desc="Sawah Mundu" value="1.000.000" />
            <x-card_listitem photo="{{asset('dist/img/default-150x150.png')}}" link="#" title="Bobi" desc="Sawah Karangampel" value="2.000.000" />
            <x-slot:footer>
                <a href="#" class="uppercase">View All</a>
            </x-slot> 
        </x-card_list>
    </div>
    <!-- <div class="row mx-1">
        <x-card_section width="12" order="1" smallorder="1">
            <x-card name="Dashboard">
                Navbar Search Result: {{ $search }}
            </x-card>
        </x-card_section>
    </div> -->
</div>