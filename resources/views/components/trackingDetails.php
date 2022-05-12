<?php
    foreach($request as $row){

        $date = date_create($row['accepted_date']);
        $date2 = date_create($row['req_date']);
        $adate = date_format($date, "F j, Y, g:i a");   
        $rdate = date_format($date2, "F j, Y, g:i a");   
  
        // $status = $row['status'];

        if($row['status'] == 1){
            $status = 'pending';
            $adate = NULL;
        ?>

            <tr>
                <th class="ps-5">Tracking No.</th>
                <td class="ps-5"><?php echo $row['tracking_id']; ?></td>
            </tr>
            <tr>
                <th class="ps-5" >Booking Date</th>
                <td class="ps-5"><?php echo $rdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Start of Delivery</th>
                <td class="ps-5"><?php echo $adate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Delivered Date</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Canceled Date</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Seller's Name</th>
                <td class="ps-5"><?php echo $row['Name'].' '.$row['L_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Delivery Mans's Name</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Status</th>
                <td class="ps-5"><?php echo $status;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Recipient Name</th>
                <td class="ps-5"><?php echo $row['recepient_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Recipient Address</th>
                <td class="ps-5"><?php echo $row['recepient_address'].' '.$row['recepient_municipality'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Product/Parcel Name</th>
                <td class="ps-5"><?php echo $row['product_name'];?></td>
            </tr>

        <?php
        }else if($row['status'] == 2){
            $status = 'accepted - (for delivery)';

            ?>

            <tr>
                <th class="ps-5">Tracking No.</th>
                <td class="ps-5"><?php echo $row['tracking_id']; ?></td>
            </tr>
            <tr>
                <th class="ps-5" >Booking Date</th>
                <td class="ps-5"><?php echo $rdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Start of Delivery</th>
                <td class="ps-5"><?php echo $adate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Delivered Date</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Canceled Date</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Seller's Name</th>
                <td class="ps-5"><?php echo $row['Name'].' '.$row['L_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Delivery Mans's Name</th>
                <td class="ps-5"><?php echo $row['delP_fName'].' '.$row['delP_lName'];?></td>
            </tr>
            <tr>
                <th class="ps-5" >Status</th>
                <td class="ps-5"><?php echo $status;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Recipient Name</th>
                <td class="ps-5"><?php echo $row['recepient_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Recipient Address</th>
                <td class="ps-5"><?php echo $row['recepient_address'].' '.$row['recepient_municipality'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Product/Parcel Name</th>
                <td class="ps-5"><?php echo $row['product_name'];?></td>
            </tr>

        <?php
        }else if($row['status'] == 0){
            $status = 'cancelled';

            $date3 = date_create($row['cancelsuccess_date']);
            $cdate = date_format($date3, "F j, Y, g:i a");    
            $adate = NULL;
            ?>

            <tr>
                <th class="ps-5">Tracking No.</th>
                <td class="ps-5"><?php echo $row['tracking_id']; ?></td>
            </tr>
            <tr>
                <th class="ps-5" >Booking Date</th>
                <td class="ps-5"><?php echo $rdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Start of Delivery</th>
                <td class="ps-5"><?php echo $adate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Delivered Date</th>
                <td class="ps-5"></td>
            </tr>
            <tr>
                <th class="ps-5" >Canceled Date</th>
                <td class="ps-5"><?php echo $cdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Seller's Name</th>
                <td class="ps-5"><?php echo $row['Name'].' '.$row['L_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Delivery Mans's Name</th>
                <td class="ps-5"><?php echo $row['delP_fName'].' '.$row['delP_lName'];?></td>
            </tr>
            <tr>
                <th class="ps-5" >Status</th>
                <td class="ps-5"><?php echo $status;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Recipient Name</th>
                <td class="ps-5"><?php echo $row['recepient_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Recipient Address</th>
                <td class="ps-5"><?php echo $row['recepient_address'].' '.$row['recepient_municipality'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Product/Parcel Name</th>
                <td class="ps-5"><?php echo $row['product_name'];?></td>
            </tr>

        <?php
        }elseif($row['status'] == 3){
            $status = 'delivered';
            $date3 = date_create($row['cancelsuccess_date']); 
            $sdate = date_format($date3, "F j, Y, g:i a"); 
            $cdate = NULL;

            ?>

            <tr>
                <th class="ps-5">Tracking No.</th>
                <td class="ps-5"><?php echo $row['tracking_id']; ?></td>
            </tr>
            <tr>
                <th class="ps-5" >Booking Date</th>
                <td class="ps-5"><?php echo $rdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Start of Delivery</th>
                <td class="ps-5"><?php echo $adate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Delivered Date</th>
                <td class="ps-5"><?php echo $sdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Canceled Date</th>
                <td class="ps-5"><?php echo $cdate;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Seller's Name</th>
                <td class="ps-5"><?php echo $row['Name'].' '.$row['L_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Delivery Mans's Name</th>
                <td class="ps-5"><?php echo $row['delP_fName'].' '.$row['delP_lName'];?></td>
            </tr>
            <tr>
                <th class="ps-5" >Status</th>
                <td class="ps-5"><?php echo $status;?></td>
            </tr>
            <tr>
                <th class="ps-5" >Recipient Name</th>
                <td class="ps-5"><?php echo $row['recepient_name'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Recipient Address</th>
                <td class="ps-5"><?php echo $row['recepient_address'].' '.$row['recepient_municipality'];?></td>
            </tr>
            <tr>
                <th class="ps-5">Product/Parcel Name</th>
                <td class="ps-5"><?php echo $row['product_name'];?></td>
            </tr>

        <?php
        }
        //55trial345897

    }
?>