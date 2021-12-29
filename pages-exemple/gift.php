<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/gift-table.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <title>Recharges mobiles</title>
</head>

<body>
    <header>

        <div class="navigation">
            <div class="menu-m-left">
                <h3>Recharge mobile International</h3>
            </div>
            <div class="menu-m-center">
                <article>

                    <img src="assets/images/mobile-iphone.jpg" alt="mobile-iphone" srcset="">
                </article>

            </div>
            <div class="menu-m-right">
                <div class="interface-user">
                    <img src="assets/images/menu.png" alt="menu-icon">

                </div>
            </div>
        </div>
    </header>

    <div class="contenair" id="contenair">
        <div class="contenair-items" id="contenair_items_">
        <article>
                <h1>GIFTS.</h1>
                <label for="countries">Choisir le pays de destination:</label><br>
                <select id="countries">
                    <?php
                    require 'vendor/autoload.php';

                    use Panda\Mobiletopup\countries;
                    use Panda\Mobiletopup\countriesByTraverlPayout;

                    $countriesByTravel = new countriesByTraverlPayout();
                    $countries = new countries();
                    //echo json_encode($countriesByTravel);
                    $result = json_decode($countriesByTravel->parameters_2(), true);
                    echo "<option>Selectionner le pays</option>";
                  /*  foreach ($result as $key => $value) {
                        echo json_encode($value);
                        echo "<option value='" . $value['code'] . "'>" . $value['name'] . "</option>";
                    }*/
                  $result = json_decode($countries->countries_(), true);
                    foreach ($result as $key => $value) {
                        echo "<option value='" . $value['isoName'] . "'>" . $value['name'] ."</option>";
                    }

                    ?>
                </select>


                <?php

               // echo json_encode($countries);
                ?>

            </article>
        </div>
        <div >
        <div id="myDynamicTable">
<table>
    <thead>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </tr>
    </thead>
</table>


        </div>
        </div>
    
      



          

        </div>

    </div>
 


</body>
<script>
    
    $(document).ready(function() {
    $('#dtable').DataTable();
} );


   
    $(document).on("change", "#countries", function() {
        var countrieiso = document.getElementById('countries').value;
        $.ajax({
            url: "the_gifts.php",
            method: "post",
            data: {
                countrieiso: countrieiso
            },
            success: function(data) {
                console.log(data);
                data = $.parseJSON(data);


                
             /*   let table = document.createElement('table');
               // table.border="1";
               table.id="dtable";
               table.class="display";          
               table.style="width:100%";
                let thead = document.createElement('thead');
                let tbody = document.createElement('tbody');
                table.appendChild(thead);
                table.appendChild(tbody);
                document.getElementById('myDynamicTable').appendChild(table);

               let row_1 = document.createElement('tr');
                let heading_1 = document.createElement('th');
                heading_1.innerHTML = "Geo.";
                let heading_2 = document.createElement('th');
                heading_2.innerHTML = "Weather";
                let heading_3 = document.createElement('th');
                heading_3.innerHTML = "Wind";
                let heading_4 = document.createElement('th');
                heading_4.innerHTML = "City";
               
                row_1.appendChild(heading_1);
                row_1.appendChild(heading_2);
                row_1.appendChild(heading_3); 
                row_1.appendChild(heading_4);

                thead.appendChild(row_1);
                for (let index = 0; index < data.length; index++) {
                  
                    console.log(data[index]);

                    let row_2 = document.createElement('tr');
                            let row_2_data_1 = document.createElement('td');
                            row_2_data_1.innerHTML = data[index].productId;
                            let row_2_data_2 = document.createElement('td');
                            row_2_data_2.innerHTML =data[index].productId;
                            let row_2_data_3 = document.createElement('td');
                            row_2_data_3.innerHTML = data[index].productId;
                            let row_2_data_4 = document.createElement('td');
                            row_2_data_4.innerHTML = data[index].productId;

                            row_2.appendChild(row_2_data_4);
                            row_2.appendChild(row_2_data_1);
                            row_2.appendChild(row_2_data_2);
                            row_2.appendChild(row_2_data_3);

                            tbody.appendChild(row_2);


                }
                */
                console.log(data[0].logoUrls[0]);



            }
        });

     



    });


  

 

   
</script>



<footer>

</footer>

</html>