    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      

        var options = {
        title: 'Gewicht',
        curveType: 'function',
        legend: { position: 'bottom' },
        width: 800, // Stel de breedte in op 100% van de beschikbare ruimte
        height: 600,   // Stel de hoogte in op een specifieke waarde, bijvoorbeeld 400 pixels
      };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        
        var data = google.visualization.arrayToDataTable([
          ['Dag/Maand', 'Gewicht'],
          <?php echo $gewicht;?>
        ]);

        chart.draw(data, options);
      }
    </script>

