 <?php
 
 
                     include '../login/config.php';
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                      
                          foreach($result as $row)
                          {
                              try
                                {
                                    $table_name = $row['transtion_table'];
                                    $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name";      
                                    $row_as_produ = $link->prepare($row_as_prod);
                                    $row_as_produ->execute();
                                    $row_as_product = $row_as_produ->fetchall();
                                    //echo $row_as_product["SUM(Total_Cost)"];
                                }
                                catch(PDOException $e)
                                {
                                $msg =  $e->getMessage();
                                }
                                //echo $msg;
                                
                                foreach($row_as_product as $row):
                                {
                                    $var += $row['SUM(Total_Cost)'];
                                }
                                endforeach;
                          }
                          
                          echo $var;
                      
                      
                      
                 ?>