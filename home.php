<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./css/main.css" type="text/css">
    <script src="js/main.js"></script>
    <script src="js/type.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="head" style="display:flex;padding:2%">
    <img src="images/logo.png">
<section id="section-id-1639342943052" class="sppb-section" style="margin-right:0;margin-left:auto;">
    <div class="sppb-row-container">
        <div class="sppb-row">
            <div class="sppb-col-md-12">
                <div id="column-id-1639342943051" class="sppb-column">
                    <div class="sppb-column-addons">
                        <div id="sppb-addon-1639342943055" class="clearfix">
                            <div class="sppb-addon sppb-addon-text-block 0 sppb-text-center ">
                                <div class="sppb-addon-content">
                                    <h1>IRES INTELLIGENCE PLATFORM&nbsp;</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>

<p><input id="myInput" onkeyup="fn()"  type="text" placeholder="Chercher.."/></p>

<div class="body" style="display: flex">
    <div class="split left">
        <div class="centered">

              <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM category";
                    $sql2 = "SELECT * FROM souscategory where category_id=";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                 echo "<div class='row' id='category".$row['category_Id']."'>";
                                  echo "<h2 class='row_title'>".$row['nom']."</h2>";
                                       if($result2 = mysqli_query($link, $sql2.$row['category_Id'])){
                                                          if(mysqli_num_rows($result2) > 0){
                                                                  while($row2 = mysqli_fetch_array($result2)){
                                                                  echo "<div class='column article_content'>";
                                                                  echo "<div class='card' id='category".$row['category_Id']."souscategory".$row2['souscategory_Id']."'>";
                                                                  echo "<a href='type.php?id=".$row2['souscategory_Id']."'>";
                                                                  echo "<img class='article_img' src='images/img1.jpg' width='100%'' height='auto'>";
                                                                  echo "<p class='article_title'>".$row2['nom']."</p>";
                                                                  echo "</a>";
                                                                  echo "</div>";
                                                                  echo "</div>";
                                                                  }
                                                              mysqli_free_result($result2);
                                                          } else{
                                                              echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                                          }
                                                      } else{
                                                          echo "Oops! Something went wrong. Please try again later.";
                                                      }

                                         echo "</div>";
                                }
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>

        </div>
    </div>

    <div class="split right">
        <div class="centered">
            <img src="img_avatar.png" alt="Avatar man">
            <h2>John Doe</h2>
            <p>Some text here too.</p>
        </div>
    </div>
</div>

</body>
</html>