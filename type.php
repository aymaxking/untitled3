
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/type.css" type="text/css">
    <script src="js/type.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/sunburst.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          <script>
          var data = [];
          localStorage.setItem('currenttag',1);

          function addparent(parenttitle){
          data.push({
                  id: '0.0',
                  parent: '',
                  name: parenttitle
          });
          }

          function addchild(childtitle,childid){
          data.push(
          {
                  id: childid,
                  parent: '0.0',
                  name: childtitle,
                  value: 1
              },
              );
          }
          </script>

</head>
<body>
 <?php
                        require_once "config.php";
         $sql = "SELECT * FROM souscategory where souscategory_Id=".$_GET['id'];
         $sql2 = "SELECT * FROM category where category_Id=";
         $sql4 = "SELECT * FROM tag where souscategory_id=".$_GET['id'];
         $ct=0;
          ?>
<div>
    <div class="body" style="display: flex">
                      <?php
                 function createarticles($link,$tagid){
                 echo '<p style="display:none" id="ct" name="ct">'.$tagid.'</p>';
                          if($tagid==0)
                          $sql3 = "SELECT * FROM article where souscategory_id=".$_GET['id']."";
                          else
                          $sql3 = "SELECT * FROM article where souscategory_id=".$_GET['id']." and article_Id in (select article_Id from article_tag where tag_Id =".$tagid.")";
                                              if($result3 = mysqli_query($link, $sql3)){
                                                                          if(mysqli_num_rows($result3) > 0){
                                                                          $count=0;
                                                                                  while($row3 = mysqli_fetch_array($result3)){
                                                                                  $count++;
                                                                                  if($count>3)
                                                                                   echo "<article class='day-forecast' style='display:none'>";
                                                                                   else
                                                                                  echo "<article class='day-forecast'>";
                                                                                  echo "<div class='article_container'>";
                                                                                  echo "<img src='images/img3.jpg' class='article_img'>";
                                                                                  echo "<h2 class='article_title'>".$row3['nom']."</h2>";
                                                                                  echo "<hp class='article_content'>".$row3['contenu']."</p>";
                                                                                  echo "<p class='article_plus'><a href=''#''>Lire plus.....</a></p>";
                                                                                  echo "</div>";
                                                                                  echo "</article>";
                                                                                  }
                                                                          } else{
                                                                              echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                                          }
                                                                      } else{
                                                                          echo "Oops! Something went wrong. Please try again later.";
                                                                      }
                                                                      return " test alert";

             }
            ?>
    <div class="split left">
        <div class="centered">
            <figure
                    class="highcharts-figure">
                <div
                        id="chartcontainer"></div>
            </figure>
        </div>
    </div>



    <div class="split right">
        <div class="centered">

            <div class="card" style="width: 100%;margin-bottom: 3%">
                <div class="imgcontainer">
                    <img class="card-img-top" src="images/img1.jpg" style="width: 100%;height: 200px" alt="Card image cap">
                    <div class="imgtextcentered">
                      <?php
                               if($result = mysqli_query($link, $sql)){
                                                           if(mysqli_num_rows($result) > 0){
                                                                   while($row = mysqli_fetch_array($result)){
                                                                   echo '<script type="text/JavaScript">addparent("'.$row['nom'].'"); </script>';
                                                                                      if($result4 = mysqli_query($link, $sql4)){
                                                                       if(mysqli_num_rows($result4) > 0){
                                                                      $i=1;

                                                                                while($row4 = mysqli_fetch_array($result4)){

                                                                      echo '<script type="text/JavaScript">addchild("'.$row4['nom'].'",'.$i.'); </script>';
                                                                      $i++;
                                                                        }
                                                                      }

                                                                   }

                                                                                  if($result2 = mysqli_query($link, $sql2.$row['category_id'])){
                                                                                                              if(mysqli_num_rows($result) > 0){
                                                                                                                      while($row2 = mysqli_fetch_array($result2)){
                                                                                                                      echo '<p>'.$row2['nom'].'</p>';
                                                                                                                      echo '<p>'.$row['nom'].'</p>';                                                                                                                      }
                                                                                                                  mysqli_free_result($result2);
                                                                                                              }
                                                                                                          }
                                                               echo "</div>";
                                                               echo "</div>";
                                                               echo"<div class='card-body'>";
                                                               echo "<p>".substr($row['resume'], 0, 300)."<span id='dots'>...</span><span id='more'>".substr($row['resume'],301)."</span></p>";
                                                               echo "<button onclick='readmore()'' id='myBtn'>Read more</button>";
                                                               echo "</div>";
                                                                   }
                                                           } else{
                                                               echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                           }
                                                       } else{
                                                           echo "Oops! Something went wrong. Please try again later.";
                                                       }

                                                        ?>
            </div>

<article class="forecast" >
    <h1>PUBLICATIONS</h1>
        <div id="publications">
        <?php
        createarticles($link,$ct);
        ?>
        </div>
       </article>


<article class="forecast">
    <h1>VIDEOS</h1>

</article>


<article class="forecast">
    <h1>INTERACTIVE DATA</h1>

</article>

        </div>
    </div>



    </div>
</div>
<script>

    Highcharts.chart('chartcontainer', {
        chart: {
            height: '100%',
        },
        title: {
            text: 'C'
        },
        colors: ['transparent'].concat(Highcharts.getOptions().colors),
        colors: ['#784cfb', '#FF8C00', '#ffffff', '#E40303'],
        subtitle: {},
        series: [{
            type: 'sunburst',
            data: data,
            allowDrillToNode: true,
            cursor: 'pointer',
            events: {
                click:
                    function (e) {
                            /* document.getElementById("publications").innerHTML = '<?php createarticles($link,$ct);?>';*/
                    }
            },
            dataLabels: {
                format:
                    '{point.name}',
                filter: {
                    property: 'innerArcLength',
                    operator: '>',
                    value: 16
                },
                rotationMode: 'circular'
            },
            levels: [{
                level: 1,
                levelIsConstant: false,
                dataLabels: {
                    filter: {
                        property: 'outerArcLength',
                        operator: '>',
                        value: 64
                    }
                }
            }, {
                level: 2,
                colorByPoint: true
            },
                {
                    level: 3,
                    colorVariation: {key: 'brightness', to: -0.5}
                }, {
                    level: 4,
                    colorVariation: {key: 'brightness', to: 0.5}
                }]
        }],
        tooltip: {}
    });
</script>
</body>
</html>