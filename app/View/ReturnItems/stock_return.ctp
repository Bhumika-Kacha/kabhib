<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script> 
<script>
  $().ready(function() {
      $("#stock_returnStockReturnForm").validate({
      });
  });
  $.validate();
</script>
<?php  if(!empty($db_data)) {
  echo "<h1><b>Take Return :</b></h1>";
?>
          <?php
              echo $this->Form->create('stock_return',array('url'=>array('controller'=>'ReturnItems',
                                        'action'=>'select_return')));
              $i=0;
              echo "<table class='table table-hover'>";
              echo "<tr class='info'><th>OrderID</th><th>Item</th><th style='width: 150px;'>Received quantity</th>
              <th style='width: 200px;'>Return Quantity</th><th>Remark</th></tr>";
              foreach ($db_data as $key => $value) {
                $v1=$order_id;
                $v2=$value['DeliveryDetail']['item_name'];
                $v3=$value['DeliveryDetail']['quantity'];
                $v4=$value['DeliveryDetail']['type'];
                ?>
                <tr>
                <td>
                  <label><?php echo $order_id;  ?></label>
                </td>
                <td>
                  <label><?php echo $value['DeliveryDetail']['item_name'];  ?></label>
                </td>
                <td>
                  <label><?php echo $value['DeliveryDetail']['quantity'];  ?></label>
                </td>
                <td>
                <?php echo $this->Form->input($i.'.return_qty', array('type' => 'text', 'label'=>false,
                                    'class'=>'required rqtyinput','data-validation'=>'number'));?>
                </td>
                <td>
                <?php echo $this->Form->textarea($i.'.note', array('type' => 'textarea', 'label'=>false,
                                                          'class'=>'required rqtyinput txtbox',
                                                          'rows' =>'1',
                                                          'cols' => '160'));?>
                </td>
              <?php echo $this->Form->input($i.'.order_id',array('type'=>'hidden','value'=>$v1)); ?>
              <?php echo $this->Form->input($i.'.item_name',array('type'=>'hidden','value'=>$v2)); ?>
              <?php echo $this->Form->input($i.'.delivered_qty',array('type'=>'hidden','value'=>$v3)); ?>
              <?php echo $this->Form->input($i.'.type',array('type'=>'hidden','value'=>$v4)); ?>

         

            <?php $i++; echo "</tr>";} echo"</table>"; ?>
            <input type="submit" value="Submit" class='submitbtn btn4 btn-success btn2'> 
            <?php echo $this->Form->end();?>
<?php } else {?>
             <div>Please Insert Valid Order ID.</div>

             <?php }?>

