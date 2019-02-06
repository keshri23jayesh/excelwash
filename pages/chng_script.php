<?php
                      include '../login/config.php';
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      //$var = 0;
                      foreach($result as $row)
                      {
                        $table_name = $row['transtion_table'];
                        $row_as_prod = "SELECT * FROM $table_name";
                        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $row_as_produ = $link->prepare($row_as_prod);
                        $row_as_produ->execute();
                        $row_as_product = $row_as_produ->fetchall();
                        //echo $row_as_product["SUM(Total_Cost)"];
                        
                        foreach($row_as_product as $row):
                        {
                            // $var="";
                            // $mounth="";
                            // $date="";
                            // $year="";
                            // $newdate="";
                            // $id="";
                            
                            // $var = $row['Ddate'];
                            // //echo $var." old"."<br>";
                             $id = $row['id'];
                            // list($year,$mounth,$date) = explode('-',$var);
                            // $newdate="";
                            // $newdate = $row['year']."-".$row['mounth']."-".$row['date'];
                            
                            // $newdate = (string)$newdate;
                            
                            // $newdate = str_replace(' ', '', $newdate);
                            //echo $newdate;
                            //echo " new ".$mounth."-".$year."-".$date."<br>";
                            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            //$sql = "UPDATE $table_name SET Ddate = '$newdate' WHERE id = '$id'";
                            $shift = "Morning";
                            $sql = "UPDATE $table_name SET shift = '$shift' WHERE id = '$id'";
                            $link->exec($sql);
                            
                            // $id="";
                            // $sql="";
                            // $var="";
                            // $mounth="";
                            // $date="";
                            // $year="";
                            // $newdate="";
                        }
                        endforeach;
                        echo "<br>";
                      }
                      echo "DONE";
                 ?>