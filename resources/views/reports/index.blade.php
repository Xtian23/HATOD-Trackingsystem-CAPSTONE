<div class="row">
<div class="reports title-text">
<h3  align="center">REPORT(s)</h3>	
</div>
	<div class="col-sm-12">
		<?php get_success_messages()?>
<div align="center">
		<form class="form-inline" method="GET" action="<?=current_url()?>">
		  <div class="form-group">
		    <label >Start Date</label>
		    <input type="date" class="form-control" name="start_date" value="<?php echo $this->input->get('start_date') ?>">
		  </div>
		  <div class="form-group">
		    <label >End Date</label>
		    <input type="date" class="form-control" name="end_date" value="<?php echo $this->input->get('end_date') ?>">
		  </div>
		  <div class="form-group">
		    <label>Customer</label>
		    <?php echo form_dropdown('customer', ['' => ''] + array_column($customers, 'fullname', 'id'), $this->input->get('customer'), 'class="form-control"') ?>
		  </div>
		  <div class="form-group">
		    <label>Status</label>
		   	<?php echo form_dropdown('status', ['' => '', 'RECEIVED' => 'RECEIVED', 'DELIVERED' => 'DELIVERED'], $this->input->get('status'), 'class="form-control"') ?>
		  </div>
		  <button type="submit" class="btn btn-primary">Filter</button>
		</form>

</div>		
		<table class="table table-striped" style="margin-top:10px">
		<thead class="thead-inverse">
    <tr>
      <th>ORDER#</th>
      <th>Order Date/Time</th>
      <th>Customer</th>
      <th>Address</th>
      <th>Delivery Personnel</th>
      <th>Status</th>
      <th>Total Amount</th>
      <th>
        <span></span>
          Action  
      </th>


    </tr>
  </thead>
  <tbody>
    @foreach($orders as $row)
      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ date_create($row->order_date)->format('M d, Y') }}</td>
        <td>{{ $row->customer->fullname }}</td>
        <td>{{ $row->customer->address }}</td>
        <td>{{ $row->deliveryPersonnel->fullname }}</td>
        <td>??</td>
        <td>{{ number_format($row->total, 2) }}</td>
        <td></td>
      </tr>
    @endforeach
     
  </tbody>
		</table>
	</div>
</div>