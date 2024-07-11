  <!-- <script src="./assets/js/jquery.js"></script> -->
    
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/datatable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
   <script>
      // Line Chart
      var lineCtx = document.getElementById('materialsChart').getContext('2d');
      var materialsChart = new Chart(lineCtx, {
          type: 'line',
          data: {
              labels: ['عربي', 'رياضيات', 'لغة انجليزية', 'لغة تانية', 'دراسات', 'علوم'],
              datasets: [{
                  label: 'المواد',
                  data: [15, 40, 80, 40, 20, 70],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
  </script>
    <script>
      // Line Chart
      var lineCtx = document.getElementById('materialsHlepersChart').getContext('2d');
      var materialsHlepersChart = new Chart(lineCtx, {
          type: 'line',
          data: {
            labels: ['عربي', 'رياضيات', 'لغة انجليزية', 'لغة تانية', 'دراسات', 'علوم'],
              datasets: [{
                  label: 'المواد التفاعلية',
                  data: [15, 40, 80, 40, 20, 70],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
  </script>

<script>
  $(function() {
     $("#date").datepicker({
         changeYear: true,
         changeMonth:true,
         dateFormat: 'mm/dd/yy',
         minDate: new Date('01/01/1900'),
         maxDate: '+1Y'
     });
})
</script>
  </body>
</html>
