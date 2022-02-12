@if(!empty($customers))   
<div class="table-responsive tableFixHead">
   <table id="customer" class="table table-striped table-bordered table-hover">
      <thead>
         <tr class="bg-primary">
            <th class="col-xs-1 col-sm-1 col-md-1">ID</th>           
            <th class="col-xs-2 col-sm-2 col-md-2">NAME</th>           
            <th class="col-xs-2 col-sm-2 col-md-2">MOBILE</th>           

            <th class="col-xs-2 col-sm-2 col-md-2">EMAIL</th>           
            <th class="col-xs-2 col-sm-2 col-md-2">CITY</th>           

            <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
         </tr>
      </thead>
      <tbody >
         
         @foreach($customers as $customer)
         
         <tr>
            <td >{{ $customer->id }}</td>
            <td >{{ $customer->customer_name }}</td>
            <td >{{ $customer->mobile }}</td>
            <td >{{ $customer->email }}</td>
            <td >{{ $customer->city }}</td>
            <td>
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $customer->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $customer->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
<!-- </div> -->
