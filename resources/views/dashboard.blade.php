<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Chart 1 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white p-4">
                <canvas id="chart1"></canvas>
            </div>
            <!-- Chart 2 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white p-4">
                <canvas id="chart2"></canvas>
            </div>
            <!-- Chart 3 -->
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white p-4">
                <canvas id="chart3"></canvas>
            </div>
        </div>

        <!-- Large Chart -->
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white p-4">
            <canvas id="chart4" class="h-full w-full"></canvas>
        </div>
    </div>

    <!-- Scripts para Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Chart(document.getElementById('chart1'), {
                type: 'bar',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May'],
                    datasets: [{
                        label: 'Ventas',
                        data: [12, 19, 3, 5, 2],
                        backgroundColor: 'rgba(59, 130, 246, 0.7)'
                    }]
                }
            });

            new Chart(document.getElementById('chart2'), {
                type: 'pie',
                data: {
                    labels: ['Producto A', 'Producto B', 'Producto C'],
                    datasets: [{
                        data: [10, 20, 30],
                        backgroundColor: ['#f87171', '#60a5fa', '#34d399']
                    }]
                }
            });

            new Chart(document.getElementById('chart3'), {
                type: 'line',
                data: {
                    labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
                    datasets: [{
                        label: 'Ingresos',
                        data: [5, 10, 15, 7, 12],
                        fill: false,
                        borderColor: '#10b981',
                        tension: 0.3
                    }]
                }
            });

            new Chart(document.getElementById('chart4'), {
                type: 'bar',
                data: {
                    labels: ['Sucursal 1', 'Sucursal 2', 'Sucursal 3', 'Sucursal 4'],
                    datasets: [{
                        label: 'Facturación mensual',
                        data: [3000, 4500, 3200, 4000],
                        backgroundColor: '#6366f1'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app>