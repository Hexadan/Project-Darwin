<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Banned Patrons</title>

    <style>

      .container
      {
        display: grid;
        grid-template-columns: 350px 1fr 350px;
        grid-template-areas:
          ". content .";
      }

      .content
      {
        grid-area: content;
      }

      .row-container
      {
        display: grid;
        grid-template-rows: repeat(1, 1fr);
      }

      .row
      {
        display: grid;
        grid-template-columns: 1fr 4fr;
        grid-template-areas:
          "picture details";

        padding: 3px;
        margin: 5px;
      }

      .picture
      {
        grid-area: picture;
        height: 125px;
      }

      .patron-image
      {
        height: 100%;
        max-height: 125px;
      }

      .details
      {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
        grid-template-areas:
          "personal"
          "location"
          "license";

        grid-area: details;
      }

      .personal
      {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-areas:
          "fname mname lname bdate";

        grid-area: personal;
        padding-top: 10px;
      }

      .fname
      {
        grid-area: fname;
      }

      .mname
      {
        grid-area: mname;
      }

      .lname
      {
        grid-area: lname;
      }

      .bdate
      {
        grid-area: bdate;
      }

      .location
      {
        display: grid;
        grid-template-columns: 1.4fr 1fr 0.2fr;
        grid-template-areas:
          "address city state";

        grid-area: location;
        padding-top: 10px;
      }

      .address
      {
        grid-area: address;
      }

      .city
      {
        grid-area: city;
      }

      .state
      {
        grid-area: state;
      }

      .license
      {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-areas:
          "jurisdictionID driverslicenseID expirationDate";

        grid-area: license;
        padding-top: 10px;
      }

      .jurisdictionID
      {
        grid-area: jurisdictionID;
      }

      .driverslicenseID
      {
        grid-area: driverslicenseID;
      }

      .expirationDate
      {
        grid-area: expirationDate;
      }

    </style>

  </head>
  <body>

    <div class="container">
      <div class="content">
        <div class="row-content">

          <?php

          $query = "SELECT * FROM patrons WHERE banned='1'";

          include("database-connection.php");

          $result = $db_conn->query($query);

            if($result->num_rows)
            {
              while($info = $result->fetch_assoc())
              {
                  echo '<div class="row" style="border:1px solid red;">';
                  echo '<div class="picture">';
                  echo '<img src="temp.png" class="patron-image">';
                  echo '</div>';
                  echo '<div class="details">';
                  echo '<div class="personal">';
                  echo '<div class="fname">'. $info["firstName"] .'</div>';
                  echo '<div class="manme">'. $info["middleName"] .'</div>';
                  echo '<div class="lname">'. $info["lastName"] .'</div>';
                  echo '<div class="bdate">'. $info["birthDate"] .'</div>';
                  echo '</div>';
                  echo '<div class="location">';
                  echo '<div class="address">'. $info["address"] .'</div>';
                  echo '<div class="city">'. $info["city"] .'</div>';
                  echo '<div class="state">'. $info["state"] .'</div>';
                  echo '</div>';
                  echo '<div class="license">';
                  echo '<div class="jurisdictionID">'. $info["jurisdictionID"] .'</div>';
                  echo '<div class="driverslicenseID">'. $info["driversLicenseID"] .'</div>';
                  echo '<div class="expirationDate">'. $info["expDate"] .'</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
              }
            }
            else
            {
                echo "<div><h2>No Patrons.</h2></div>";
            }


          ?>
          <!--
          <div class="row">
            <div class="picture">
              <img src='temp.png' class="patron-image">
            </div>
            <div class="details">
              <div class="personal">
                <div>Name</div>
              </div>
              <div class="dl">
                <div>DL</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="picture">
              <img src='temp.png' class="patron-image">
            </div>
            <div class="details">
              <div class="personal">
                <div class="fname">First Name</div>
                <div class="manme">Middle Name</div>
                <div class="lname">Last Name</div>
                <div class="bdate">Birth Date</div>
              </div>
              <div class="location">
                <div class="address">Address</div>
                <div class="city">City</div>
                <div class="state">State</div>
              </div>
              <div class="license">
                <div class="jurisdictionID">jurisdiction ID</div>
                <div class="driverslicenseID">Driver's License ID</div>
                <div class="expirationDate">Expiration Date</div>
              </div>
            </div>
          </div>
          --->
        </div>
      </div>
    </div>

  </body>
</html>
