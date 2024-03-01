
<!--  body begins GF -->
 <h4 align="left" class="firstH">Results for surname</h4> 
                     <div id="container_num_1">
                        <div class="container container_no_box">
                          <div style="" >
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<?php
// basic sequence with LDAP is connect, bind, search, interpret search
// result, close connection


$ds=ldap_connect("ldap.flinders.edu.au");  // must be a valid LDAP server!


if ($ds) { 
   
    $r=ldap_bind($ds);     // this is an "anonymous" bind, typically
                           // read-only access
   
     $surname=$_POST['surname'];  
    echo "<br>Searching for surname <i>".$surname."</i>";
    // Search surname entry
   
//....new 1......
   function myReverseCnCmp( $sn, $givenname ) {
   // Note: $b comes before $a because of reverse ordering
  return strcasecmp( $givenname[cn][0], $sn[cn][0] );
  }
//.....end new 1....
   //$surname=$_POST['surname'];
    $sr=ldap_search ( $ds, "ou=people, o=flinders", "sn=$surname*");  
echo  "<br />";
//....new 2....
// before reading the entries, you must sort normally
// in my example I use the attribute 'cn' for sorting
// instead of cn you can use any other attribute
ldap_sort( $ds, $sr, "givenname" );
//....end new 2.....

    
//echo  "<br />";

    

    $info = ldap_get_entries($ds, $sr);
 
//....new 3....
// now sort the array reverse with usort
//usort( $info, "myReverseCnCmp" );

// now $info is sorted reverse based on "cn"
//...end new 3...
   echo " " . $info["count"] . " entries found<p>";

//for ($i=0; $i<$info["count"]; $i++) {

       
       echo "$welcome_string <b>" . $givenname . "</b><p />";
            //echo "<table>";
           echo "<table class = 'table table-hover'>";
			print "<tr><th>FAN<th>";
			print "<th>Surname<th>";
			print "<th>First name<th>";
            print "<th>Email<th>";
            print "<th>Unit<thd>";
			print "</tr>";
            //print "<tr bgcolor=#ffffff><td colspan=12></td></tr>\n";
    
for ($i=0; $i<$info["count"]; $i++) {
        //print "<tr bgcolor=#999999><td colspan=12></td></tr>\n";
        echo "<tr>";
        echo "<td>" . $info[$i]["cn"][0] . "<td />";
		//echo "</td><td>";
        echo "<td>" . $info[$i]["sn"][0] . "<td />";
        echo "<td>" . $info[$i]["givenname"][0] . "<td />";
        echo "<td>" . $info[$i]["mail"][0] . "<td />";
        echo "<td>" . $info[$i]["ou"][0] . "<td />";
        echo  "</td></tr>";
    }
echo "</table>";



}
ldap_close($ds);
?>                          
                          
  <!-- &&& -->
                          </div>
                        </div>
			          </div>                         
<!--  body ends GF -->

