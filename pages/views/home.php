<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="assets/css/utils.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton&effect=neon">
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script>
    $(document).ready(function() {

      $('#My_Table').DataTable();
      var groupColumn = 3;
      var table = $('#MyTable').DataTable({
        "columnDefs": [{
          "visible": false,
          "targets": groupColumn
        }],
        "order": [
          [groupColumn, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
          var api = this.api();
          var rows = api.rows({
            page: 'current'
          }).nodes();
          var last = null;

          api.column(groupColumn, {
            page: 'current'
          }).data().each(function(group, i) {
            if (last !== group) {
              $(rows).eq(i).before(
                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
              );

              last = group;
            }
          });
        }
      });

      // Order by the grouping
      $('#MyTable tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
          table.order([groupColumn, 'desc']).draw();
        } else {
          table.order([groupColumn, 'asc']).draw();
        }
      });
    });
  </script>
  <style>
    tr.group,
    tr.group:hover {
      background-color: #ddd !important;
    }
  </style>
</head>

<body>
  <section>
    <header id='header'>
      <div>MOBILE TOPUP</div>
      <div></div>
      <?php

      use Panda\Mobiletopup\mobiletopupSDK;
      use Panda\Mobiletopup\notes;

      $promitions = new mobiletopupSDK();
      $operator = new mobiletopupSDK();
      $countrieDetails = new mobiletopupSDK();
      $operators = new mobiletopupSDK();

      ?>
    </header>

    <div class="contenair">
      <div id="presentation">
        <figure>
          <img src="assets/images/presentation.jpg" alt="" srcset="">
          <figcaption class="achetervotrerecharge font-effect-neon" id="achetervotrerecharge">
            Cliquer et acheter votre recharge
          </figcaption>
        </figure>
        <p>
          <?php


          $content_ = $operator->GET_ALL_OPERATORS_();
          //echo '<div>'. $content_;
          $value_ = json_decode($content_, true);

          for ($i = 0; $i < count($value_['content']); $i++) {
            //echo '<div>'. echo '<div>'. $value_['content'][$i]['id'];
          }
          ?>
        <table id="MyTable" class="display" style="width:100%">
          <thead>
            <tr>
              <th></th>
              <th>Opérateur mobile</th>
              <th>Recharges disponibles</th>
              <th>Pays</th>

            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($value_['content'] as $key => $value) {
              $notes = new notes($value['denominationType'], $value['senderCurrencySymbol'], $value['fixedAmounts']);
              echo '<tr>';
              echo '<td>' . '<img class="img-width" src="' . $value['logoUrls'][0] . '"/>' . '</td>';
              echo '<td>' . $value['name'] . '</td>';
              echo '<td>';
              if ($value['denominationType'] == "RANGE") {
                echo  $notes->response;
              } elseif ($value['denominationType'] == "FIXED") {
                echo  $notes->response . '<br>';
                for ($i = 0; $i < count($value['fixedAmounts']); $i++) {
                  echo '<span>' . $value['fixedAmounts'][$i] . ' ' . $value['senderCurrencySymbol'] . '</span> ';
                }
                echo '<br>';
                if ($value['fixedAmountsDescriptions'] !== '') {
                  foreach ($value['fixedAmountsDescriptions'] as $key => $lvalue) {
                    if ($lvalue !== '') {
                      echo '<span>' . $key . ' ' . $value['senderCurrencySymbol'] . ' ' . $lvalue . '</span>';
                    }
                  }
                }
              }
              echo '<table id="My_Table" class="display" style="width:100%">';
              echo '<thead><tr><th></th></tr></thead>';
              echo '<tbody>';
              foreach ($value['geographicalRechargePlans'] as $key => $plans) {

                echo '<tr>';
                echo '<td>' . $plans['locationCode'] . $plans['locationName'];
                echo '<br>';
                for ($i = 0; $i < count($plans['fixedAmounts']); $i++) {
                  echo '<span>' . $value['senderCurrencySymbol'].$plans['fixedAmounts'][$i] . '</span>';
                }
                echo '<br>';
                for ($i = 0; $i < count($plans['localAmounts']); $i++) {
                  echo '<span>'.$value['destinationCurrencySymbol'] . $plans['localAmounts'][$i] . '</span>';
                }
                echo '<br>';
                //echo  json_encode($plans['localAmounts']) . '<br>';
                foreach($plans['fixedAmountsPlanNames'] as $kel =>$planNames){
                  echo '<span>'.$value['senderCurrencySymbol'] . $kel.':'.$planNames . '</span>';
                }
   
                echo '</td>';
                echo '</tr>';
              }
              echo '</tbody>';
              echo '</table>';


              echo  '</td>';
              // echo '<td>' . $value['minAmount'] .'='.$value['localMinAmount'].'</td>';
              // echo '<td>' . $value['maxAmount'].'='.$value['localMaxAmount'] . '</td>';
             // echo '<td>' . $value['country']['isoName'] . '</td>';
              echo '<td>' . $value['country']['name'] . '</td>';
              echo '</tr>';
            }



            ?>

          </tbody>
        </table>
        <?php
        /*  foreach ($value_['content'] as $key => $value) {
                                  echo '<tr>';
                                  //echo '<td>' . $value['id'] . '</td>';
                                  echo '<td>' . $value['name'] . '</td>';
                                 // echo '<td>' . $value['bundle'] . '</td>';
                                  echo '<td>' . $value['data'] . '</td>';
                                  echo '<td>' . $value['pin'] . '</td>';
                                  echo '<td>' . $value['supportsLocalAmounts'] . '</td>';
                                  echo '<td>' . $value['supportsGeographicalRechargePlans'] . '</td>';
                                  $notes=new notes($value['denominationType'], $value['senderCurrencySymbol']);
                                //  $value['denominationType'];
                                  echo '<td>' .$notes->support . '</td>';
                                  echo '<td>' . $value['senderCurrencyCode'] . '</td>';
                                  echo '<td>' . $value['senderCurrencySymbol'] . '</td>';
                                  echo '<td>' . $value['destinationCurrencyCode'] . '</td>';
                                  echo '<td>' . $value['destinationCurrencySymbol'] . '</td>';
                                  echo '<td>' . $value['commission'] . '</td>';
                                  echo '<td>' . $value['internationalDiscount'] . '</td>';
                                  echo '<td>' . $value['localDiscount'] . '</td>';
                                  echo '<td>' . $value['mostPopularAmount'] . '</td>';
                                  echo '<td>' . $value['mostPopularLocalAmount'] . '</td>';
                                  echo '<td>' . $value['minAmount'] . '</td>';
                                  echo '<td>' . $value['maxAmount'] . '</td>';
                                  echo '<td>' . $value['localMinAmount'] . '</td>';
                                  echo '<td>' . $value['localMaxAmount'] . '</td>';
                                  echo '<td>' . $value['country']['isoName'] . '</td>';
                                  echo '<td>' . $value['country']['name'] . '</td>';
                                  echo '<td>' . $value['fx']['rate'] . '</td>';
                                  echo '<td>' . $value['fx']['currencyCode'] . '</td>';
                                  for ($i = 0; $i < count($value['logoUrls']); $i++) {
                      
                                    //$this->logoUrls=echo '<td>'. $value['logoUrls'][$i].'</td>'.'</td>';
                                  }
                                  echo '<td>' . '<img src="' . $value['logoUrls'][0] . '"/>' . '</td>';
                                  // echo '<td>'. $value['logoUrls'][0].'</td>';
                                  for ($i = 0; $i < count($value['fixedAmounts']); $i++) {
                                    echo '<td>' . $value['fixedAmounts'][$i] . '</td>';
                                  }
                                  if ($value['fixedAmountsDescriptions'] !== '') {
                                    for ($i = 0; $i < count($value['fixedAmountsDescriptions']); $i++) {
                                      //echo '<td>'. $value['fixedAmountsDescriptions'][$i].'</td>';
                                    }
                                  }
                      
                                  for ($i = 0; $i < count($value['localFixedAmounts']); $i++) {
                                    echo '<td>' . $value['localFixedAmounts'][$i] . '</td>';
                                  }
                                  /* for ($i=0; $i < count($value['localFixedAmountsDescriptions']) ; $i++) { 
                             // echo '<td>'. $value['localFixedAmountsDescriptions'][$i].'</td>';
                             }
                             for ($i = 0; $i < count($value['suggestedAmounts']); $i++) {
                              echo '<td>' . $value['suggestedAmounts'][$i] . '</td>';
                            }
                            // echo '<td>'. '////////////bbbbbbbbbbbbb///'.json_encode($value['suggestedAmountsMap']).'</td>';
                            if ($value['suggestedAmountsMap'] !== '') {
                              foreach ($value['suggestedAmountsMap'] as $key => $lvalue) {
                                if ($lvalue !== '') {
                                  echo '<td>' . 'recharge de ' . $key . ' ' . $value['senderCurrencySymbol'] . '=' . $lvalue . ' ' . $value['destinationCurrencySymbol'] . '</td>';
                                }
                              }
                            }
                
                            for ($i = 0; $i < count($value['suggestedAmountsMap']); $i++) {
                
                
                              //echo '<td>'. $value['suggestedAmountsMap'][$i].'</td>';
                            }
                            for ($i = 0; $i < count($value['geographicalRechargePlans']); $i++) {
                              //echo '<td>'. $value['geographicalRechargePlans'][$i].'</td>';
                            }
                            for ($i = 0; $i < count($value['promotions']); $i++) {
                              // echo '<td>'. $value['promotions'][$i].'</td>';
                            }
                            //echo '<td>'. json_encode($value['fixedAmounts']).'</td>';
                            //echo '<td>'. json_encode($value['fixedAmountsDescriptions']).'</td>';
                            //echo '<td>'. json_encode($value['localFixedAmounts']).'</td>';
                            //echo '<td>'. json_encode($value['localFixedAmountsDescriptions']).'</td>';
                            // echo '<td>'. json_encode($value['suggestedAmounts']).'</td>';
                            //
                            //echo '<td>'. json_encode($value['geographicalRechargePlans']).'</td>';
                            //echo '<td>'. json_encode($value['promotions']).'</td>';
                            echo '</tr>'; */

        ?>
        </p>




      </div>

      <?php


      $content = $promitions->GET_ALL_PROMOTIONS();
      $json = json_decode($content, true);
      for ($i = 0; $i < count($json['content']); $i++) {
        echo  "<article>";
        $operator->GET_FROM_RELOADLY_OPERATOR_DETAILS($json['content'][$i]['operatorId']);
        echo  '<h1>' . $json['content'][$i]['title'] . '</h1>';
        echo  '<p>' . $operator->cname . '</p>';
        $countrieDetails->GET_FROM_RELOADLY_COUNTRIE_DETAILS($operator->cisoNameex);
        echo  '<p><img src="' . $countrieDetails->flag . '" alt="country_flag"/></p>';
        echo  '<p><img src="' . $operator->logoUrls . '"/>' . $json['content'][$i]['description'] . '</p>';
        echo  "</article>";
        // echo '<div>'. json_encode(echo '<div>'. $value['content'][$i]);
        //promotionId,operatorId,title,title2,description,startDate,endDate,denominations,localDenominations
      }


      ?>


    </div>
    <footer id='footer'>
      <div><a href="mailto:mantemotusiaminabob@gmail.com">Contact us for more informations</a></div>
    </footer>
  </section>
  <script>
    $(document).on('click', '#achetervotrerecharge', function() {
      $.ajax({
        url: 'sdk/DB_connect.php',
        method: 'POST',
        data: {
          commencerAchats: "Rechargefacile",
          page: 'login'
        },
        success: function(data) {
          console.log(data);
          location.href = data;
        }

      })
    });
    //var acheter = document.getElementByClassName('achtervotrerecharge');
  </script>

</body>

</html>