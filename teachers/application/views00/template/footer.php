
<script src="<?php //echo base_url(); ?>../assets/js/jquery.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js">-->
   <script src="<?php echo base_url(); ?>../assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>../assets/js/datatable.js"></script>
    <script>
        
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['المواد', 'الشعب'],
                Height: 30,
                datasets: [{
                    label: 'عدد الطلاب',
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
      </script>
  </body>
</html>
