<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<p dir="ltr">
<?php
    $numbers_arr = "[";
    $arr_str = "[";
    foreach($activities as $a){
        if($a->country == ""){
            $a->country = "Unknow";
        }
        $arr_str .= '"'.$a->country.'",';
        $numbers_arr .= $a->nof_visitors.",";
        
    }
    //echo $arr_str;
    $arr_str = substr($arr_str, 0, -1);
    $numbers_arr = substr($numbers_arr, 0, -1);
    $arr_str .= "]";
    $numbers_arr .= "]";
    
  
?>
</p>
<script>
var xValues = <?php echo $arr_str; ?>;
var yValues = <?php echo $numbers_arr; ?>;
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "نسبة الزيارة من مختلف بلدان العالم"
    }
  }
});
</script>
